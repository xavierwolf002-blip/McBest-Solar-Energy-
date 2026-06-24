<?php

namespace App\Models;

/**
 * Callback Request Model
 * 
 * Handles storing and managing customer callback requests from the website.
 * Each request contains customer contact info, service interest, and preferred time.
 * 
 * Features:
 * - Automatic phone number formatting to E.164 format
 * - Status workflow (pending → called → completed)
 * - Scopes for filtering by status
 * - Relationship with User model for admin tracking
 * - Accessor for formatted phone display
 * 
 * @package App\Models
 * @property int $id
 * @property string $name Customer full name
 * @property string $phone Phone number in E.164 format
 * @property string|null $email Customer email
 * @property string|null $service_type Service interest
 * @property string|null $preferred_time Preferred callback time
 * @property string|null $message Additional details
 * @property string $status pending|called|completed|cancelled
 * @property string|null $admin_notes Internal notes
 * @property \Carbon\Carbon|null $called_at When callback was made
 * @property string|null $ip_address Customer IP
 * @property string|null $user_agent Browser info
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CallbackRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * We only allow these fields to be filled via forms to prevent mass assignment vulnerabilities.
     * IP address and user agent are captured for security and analytics.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'organization',
        'phone',
        'email',
        'service_type',
        'preferred_time',
        'message',
        'status',
        'admin_notes',
        'called_at',
        'ip_address',
        'user_agent',
    ];

    /**
     * The attributes that should be cast.
     * 
     * Casts ensure these fields are automatically converted to the correct type
     * when retrieved from or stored to the database.
     * 
     * @var array<string, string>
     */
    protected $casts = [
        'called_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * 
     * @var array<int, string>
     */
    protected $hidden = [
        'ip_address',
        'user_agent',
    ];

    /**
     * Boot method to set up model event listeners.
     * 
     * Automatically formats phone number to E.164 format before saving.
     */
    protected static function boot()
    {
        parent::boot();

        // Format phone number before saving
        static::saving(function ($model) {
            if ($model->phone) {
                $model->phone = static::formatPhoneNumber($model->phone);
            }
        });
    }

    /**
     * Format phone number to E.164 format (+2347067823798).
     * 
     * Handles various Nigerian phone number formats:
     * - 07067823798 → +2347067823798
     * - 7067823798 → +2347067823798
     * - 2347067823798 → +2347067823798
     * - +2347067823798 → +2347067823798 (no change)
     * 
     * @param string $phone
     * @return string
     */
    public static function formatPhoneNumber(string $phone): string
    {
        // Remove all non-numeric characters except +
        $phone = preg_replace('/[^0-9+]/', '', $phone);

        // If already in E.164 format, return as-is
        if (str_starts_with($phone, '+234')) {
            return $phone;
        }

        // Remove leading zeros
        $phone = ltrim($phone, '0');

        // Remove country code if present without +
        if (str_starts_with($phone, '234')) {
            $phone = substr($phone, 3);
        }

        // Add country code
        return '+234' . $phone;
    }

    /**
     * Get the formatted phone number with country code.
     * 
     * This accessor ensures the phone number is always displayed consistently
     * in the admin panel and emails.
     * 
     * @return string
     */
    public function getFormattedPhoneAttribute(): string
    {
        return $this->phone;
    }

    /**
     * Get a human-readable display of the phone number.
     * 
     * Formats: +234 706 782 3798
     * 
     * @return string
     */
    public function getPhoneDisplayAttribute(): string
    {
        $phone = $this->phone;
        
        // Format: +234 706 782 3798
        if (preg_match('/^\+234(\d{3})(\d{3})(\d{4})$/', $phone, $matches)) {
            return "+234 {$matches[1]} {$matches[2]} {$matches[3]}";
        }

        return $phone;
    }

    /**
     * Get the status badge color for display.
     * 
     * @return string
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'called' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary',
        };
    }

    /**
     * Scope a query to only include pending callbacks.
     * 
     * Used in admin dashboard to show pending requests that need attention.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include called callbacks.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCalled($query)
    {
        return $query->where('status', 'called');
    }

    /**
     * Scope a query to only include completed callbacks.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope a query to include callbacks that need follow-up.
     * 
     * Returns pending callbacks older than 24 hours.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNeedsFollowUp($query)
    {
        return $query->where('status', 'pending')
                     ->where('created_at', '<', now()->subHours(24));
    }

    /**
     * Mark this callback as "called" and record the time.
     * 
     * Called when admin clicks "Mark as Called" button in Filament panel.
     * Updates status and sets called_at timestamp for tracking response time.
     * 
     * @return bool
     */
    public function markAsCalled(): bool
    {
        return $this->update([
            'status' => 'called',
            'called_at' => now(),
        ]);
    }

    /**
     * Mark this callback as "completed".
     * 
     * @return bool
     */
    public function markAsCompleted(): bool
    {
        return $this->update([
            'status' => 'completed',
        ]);
    }

    /**
     * Mark this callback as "cancelled".
     * 
     * @param string|null $reason
     * @return bool
     */
    public function markAsCancelled(?string $reason = null): bool
    {
        $data = ['status' => 'cancelled'];
        
        if ($reason) {
            $data['admin_notes'] = ($this->admin_notes ? $this->admin_notes . "\n\n" : '') 
                                  . "Cancelled: " . $reason;
        }

        return $this->update($data);
    }

    /**
     * Get all SMS logs for this callback request.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function smsLogs(): MorphMany
    {
        return $this->morphMany(SmsLog::class, 'notifiable');
    }

    /**
     * Get all email logs for this callback request.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function emailLogs(): MorphMany
    {
        return $this->morphMany(EmailLog::class, 'notifiable');
    }

    /**
     * Get the response time in hours.
     * 
     * Calculates time between request creation and when callback was made.
     * Returns null if not yet called.
     * 
     * @return float|null
     */
    public function getResponseTimeHoursAttribute(): ?float
    {
        if (!$this->called_at) {
            return null;
        }

        return $this->created_at->diffInHours($this->called_at, true);
    }

    /**
     * Check if this callback request is overdue (>24 hours pending).
     * 
     * @return bool
     */
    public function isOverdue(): bool
    {
        return $this->status === 'pending' 
               && $this->created_at->lt(now()->subHours(24));
    }
}

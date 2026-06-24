<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_name',
        'description',
        'category',
        'location_found',
        'date_found',
        'image',
        'status',
        'uploaded_by',
        'claimed_by',
        'claimed_at',
        'returned_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_found' => 'date',
            'claimed_at' => 'datetime',
            'returned_at' => 'datetime',
        ];
    }

    /**
     * Get the user who uploaded this item.
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the user who claimed this item.
     */
    public function claimer()
    {
        return $this->belongsTo(User::class, 'claimed_by');
    }

    /**
     * Get all claims for this item.
     */
    public function claims()
    {
        return $this->hasMany(Claim::class, 'item_id');
    }

    /**
     * Check if item is available.
     *
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }

    /**
     * Check if item is claimed.
     *
     * @return bool
     */
    public function isClaimed(): bool
    {
        return $this->status === 'claimed';
    }

    /**
     * Check if item is returned.
     *
     * @return bool
     */
    public function isReturned(): bool
    {
        return $this->status === 'returned';
    }
}

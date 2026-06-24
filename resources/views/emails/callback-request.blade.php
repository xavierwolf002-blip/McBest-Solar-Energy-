@component('mail::message')
# 📞 New Callback Request

You have received a new callback request from a visitor on your McBest Solar website.

@component('mail::panel')
**Customer Details:**
- **Name:** {{ $callbackRequest->name }}
@if($callbackRequest->organization)
- **Organization:** {{ $callbackRequest->organization }}
@endif
- **Phone:** {{ $callbackRequest->phone }}
- **Request ID:** {{ $callbackRequest->id }}
- **Received:** {{ $callbackRequest->created_at->format('F j, Y \a\t g:i A') }}
- **Status:** {{ ucfirst($callbackRequest->status) }}
@endcomponent

## Action Required
Please contact the customer at **{{ $callbackRequest->phone }}** to provide them with a callback and discuss their solar and electrical service needs.

@component('mail::button', ['url' => config('app.url') . '/admin/callback-requests/' . $callbackRequest->id])
View in Admin Panel
@endcomponent

---

**McBest Renewable Solar Energy**
Powering Nigeria Sustainably

*This is an automated email notification from your McBest Solar website.*
@endcomponent

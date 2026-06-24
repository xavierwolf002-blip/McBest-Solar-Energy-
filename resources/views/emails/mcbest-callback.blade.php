@component('mail::message')
# 📞 New Callback Request

You have received a new callback request from a customer on your McBest Solar website.

@component('mail::panel')
**Customer Details:**
- **Name:** {{ $callback->name }}
@if($callback->organization)
- **Organization:** {{ $callback->organization }}
@endif
- **Phone:** {{ $callback->phone }}
@if($callback->preferred_time)
- **Preferred Time:** {{ $callback->preferred_time }}
@endif
- **Request ID:** {{ $callback->id }}
- **Received:** {{ $callback->created_at->format('F j, Y \a\t g:i A') }}
- **Status:** {{ ucfirst($callback->status) }}
@endcomponent

## Action Required
Please contact the customer at **{{ $callback->phone }}** to discuss their solar and electrical service needs.

---

**McBest Renewable Solar Energy**  
Powering Nigeria Sustainably

📍 Plot 42, Garki District, Abuja, Nigeria  
📞 +234 706 782 3798  
💬 WhatsApp: https://wa.me/2347067823798

*This is an automated email notification from your McBest Solar website.*
@endcomponent

@component('mail::message')
# Hello {{ $application->name }},

Your SISPA application status has been updated.

@component('mail::panel')
**Status:** {{ ucfirst($application->status) }}
@endcomponent

@if ($application->status === 'approved')
✅ Congratulations! Your application has been approved.
@elseif ($application->status === 'rejected')
❌ We're sorry, your application has been rejected.
@else
⏳ Your application is currently pending.
@endif

Thanks,<br>
SISPA Admin Team
@endcomponent

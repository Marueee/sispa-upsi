@component('mail::message')
# Hello {{ $application->name }},

Your SISPA application status has been updated to:

@component('mail::panel')
**{{ ucfirst($application->status) }}**
@endcomponent

@if ($application->status === 'accepted')
Congratulations! Your application has been **accepted**. We will follow up with the next steps soon.
@elseif ($application->status === 'rejected')
We regret to inform you that your application has been **rejected**. Please contact us if you’d like more information.
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent

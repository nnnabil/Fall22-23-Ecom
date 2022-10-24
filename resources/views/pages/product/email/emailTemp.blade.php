@component('mail::message')
# {{ $details['title'] }}
#{{ $details['o_details'] }}

The body of your message. 

@component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent 
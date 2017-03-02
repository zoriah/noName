@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::button', ['url' => ''])
Lorem ipsum. i am the greatest.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

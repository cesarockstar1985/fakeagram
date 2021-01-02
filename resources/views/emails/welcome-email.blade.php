@component('mail::message')
# Welcome to my Ecommerce

This is a place where you can purchase anything you want.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
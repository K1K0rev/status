<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0, user-scalable=yes">

        <meta name="handheldfriendly" content="true">
        <meta name="mobileoptimized" content="width">

        <link rel="icon" href="/images/icons/logo/logo.png" type="image/x-icon">

        <meta name="format-detection" content="telephone=no">

        <title inertia>{{ config('app.name', 'Статус') }}</title>

        @routes
        
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
        @routes
    </body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="" rel="stylesheet">
    <link rel="stylesheet" href="">
    @livewireStyles
</head>
<body dir="rtl">

<div>

@yield('content')
{{$slot}}
<!-- Scripts -->
</div>
@yield('snippet')
wfwfw
@livewireScripts
</body>
</html>

{{--// api key reCaptcha and google login and change in the view and rechptch class--}}

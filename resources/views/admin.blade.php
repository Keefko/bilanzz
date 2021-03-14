<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrácia / @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=056ndm302q5fg2a4qyl70du9n8aels7i3oy1vgpl2wk6f79a"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    {{--    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/scripts2.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('vendor/harimayco-menu/menu.js')}}"></script>--}}

</head>
<body>

@yield('content')
<script type="text/javascript" src="{{asset('admin.js')}}"></script>
</body>
</html>

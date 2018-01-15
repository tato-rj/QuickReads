<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>QuickReads | Admin</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    </head>
    <body id="page-top">
        @yield('content')
    </body>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        @yield('scripts')
</html>

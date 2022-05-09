<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset("assets/css/all.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/css/adminlte.min.css") }}">
    <!-- Admin Style -->
    <link rel="stylesheet" href="{{ asset("css/admin_main.css") }}">

</head>
<body class="antialiased">
<div id="app">
    <employees></employees>
</div>
</body>
</html>
<script src="{{ asset("js/app.js") }}"></script>
<script src="{{ asset("assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("assets/js/bootstrap.min.js") }}"></script>

<script src="{{ asset("assets/js/adminlte.min.js") }}"></script>
<script src="{{ asset("assets/js/all.min.js") }}"></script>

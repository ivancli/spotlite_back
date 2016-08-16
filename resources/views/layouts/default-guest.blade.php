<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SpotLite @yield('page-title')</title>

    <link rel="stylesheet" href="{{ asset("css/main.css") }}">
@yield('styles')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/vendor/html5shiv.min.js') }}"></script>
    <script src="{{ asset('js/vendor/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @yield('content')
</div><!-- ./wrapper -->

<script src="{{ asset("js/main.js") }}"></script>
@yield('scripts')
</body>
</html>
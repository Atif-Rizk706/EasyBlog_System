<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xtra Blog</title>
    <!-- include style -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @include('frontend.inc.style')
    @yield('spasific_style')
</head>
<body>
<!-- include sidebar -->
@include('sweetalert::alert')
@include('frontend.inc.sidebar')
<div class="container-fluid">
    <main class="tm-main">
            <!-- page content-->
            @yield('content')
            <!-- include footer -->
            @include('frontend.inc.footer')
    </main>
</div>
<!-- include script -->
@include('frontend.inc.script')
@yield('spasific_js')

</body>
</html>

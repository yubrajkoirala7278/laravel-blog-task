<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    {{--
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon"> --}}

    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- # CSS Plugins -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css') }}">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>
    <hr>
    <header class="container">
        <nav class="d-flex justify-content-between align-items-center" style="flex-wrap: wrap">
            <a href="{{ route('frontend.index') }}" class="fs-3 fw-semibold text-success">Blog Website</a>
            <a href="{{ route('admin.login') }}" class="btn btn-success fw-semibold">Login</a>
        </nav>
    </header>
    <hr>

    @yield('content')
    @yield('script')

    <!-- # JS Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>

</body>

</html>

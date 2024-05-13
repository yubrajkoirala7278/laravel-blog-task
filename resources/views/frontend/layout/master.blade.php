<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs & News</title>
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
</head>

<body>
    <div class="container d-flex justify-content-between align-items-center pt-2">
        <a href="{{ route('frontend.index') }}" class="text-decoration-none fs-5 fw-semibold text-title">Blogs &
            News</a>
        <div>
            <a href="{{ route('frontend.index') }}" class="text-decoration-none fs-5 fw-semibold text-title">Blogs</a>
            <a href="{{ route('frontend.news') }}" class="text-decoration-none fs-5 fw-semibold text-title mx-4">News</a>
            <a href="{{ route('admin.login') }}" class="btn text-white rounded-0 px-4"
                style="background-color:#0068B3;">Login</a>
        </div>
    </div>
    <hr>
    @yield('content')
    {{-- Bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @yield('script')
</body>

</html>

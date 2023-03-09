<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{route('lot.index')}}" class="nav-link active" aria-current="page">Lots</a></li>
            <li class="nav-item"><a href="{{route('category.index')}}" class="nav-link">Categories</a></li>
        </ul>
    </header>
</div>
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success w-75 center-box">
            <p align="center">{{ $message }}</p>
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>

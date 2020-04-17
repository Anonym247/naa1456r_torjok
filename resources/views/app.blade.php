<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="text/javascript" href="{{asset('bootstrap/js/bootstrap.js')}}">
    <link rel="text/javascript" href="{{asset('bootstrap/js/bootstrap.min.js')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @csrf
    <title>ТОРЖОК</title>

</head>
<body>
    <div class="header">
        <div class="col-md-4">
            <div class="logo">
                <img src="@yield('logo')" alt="will be logo">
            </div>
            <div class="manage_button">
                <button><a href="{{route('manage')}}">Manage</a></button>
            </div>
        </div>
        <div class="col-md-8"></div>
    </div>
    <div class="menu">
        this is menu
    </div>
    <div class="main_content">
        @yield('content')
    </div>
</body>
</html>

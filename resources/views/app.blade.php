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
    <title>{{config('app.app_name')}}</title>
</head>
<body style="
    background-image: url('{{config('app.images.background')}}');
    background-color: {{config('app.bg-color')}};
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position-y: 100px;">
    <div class="header">
        <div class="col-md-4">
            <a href="{{route('home')}}"><img class="logo" src="{{config('app.images.logo')}}" alt="logo"></a>
        </div>
        <div class="col-md-8">
            <div class="settings">
                <a href="{{route('settings')}}"><img src="{{config('app.images.settings')}}" alt="settings"></a>
            </div>
        </div>
    </div>
    <div class="menu">
        <nav id="header" class="navbar">
            <div id="header-container" class="container navbar-container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="brand" class="navbar-brand" href="{{route('home')}}">{{config('app.app_name')}}</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{route('motion')}}">Başla</a></li>
                        <li class="active"><a href="{{route('manage')}}">Tənzimlə</a></li>
                        <li><a href="{{}}">Haqqımızda</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main_content">
        @yield('content')
    </div>
</body>
</html>

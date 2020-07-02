<!DOCTYPE html>
<html>
<head>
    <title>Haqqımızda</title>
    <link rel="stylesheet" href="{{ (env('APP_ENV') != 'local') ? secure_asset('bootstrap/css/bootstrap.min.css') : asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ (env('APP_ENV') != 'local') ? secure_asset('css/style_about.css') : asset('css/style_about.css')}}">
</head>
<body style="background-image: url('{{asset('/uploads/images/about_background.jpg')}}'); background-repeat: no-repeat; background-size: cover;">
<div class="main-main">
    <div class="back_to_home btn glyphicon-backward glyphicon">
        <a href="/">Evə qayıt</a>
    </div>
    <div class="main-main-1">PROYEKTIN QURUCULARI</div>
    <div class="main-main-2"><i class="glyphicon glyphicon-plane" aria-hidden="true"></i><span></span> MİLLİ AVİASİYA AKADEMİYASININ TƏLƏBƏLƏRİ <span></span><i class="glyphicon glyphicon-plane" aria-hidden="true"></i>
    </div>
    <br>

    <br>
    <br>
    <div class="main-main-3">
        <div class="main-4">
            <p>
                <img class="photo" src="{{asset('/uploads/images/fib.jpg')}}" alt>
            </p>
            <div class="the_name"><b>Əliyeva Fidan Allahverdi</b></div>
            <p><b><i>Web-Designer / Boş gediş muftası</i></b></p>
            <p><i class="glyphicon glyphicon-envelope" aria-hidden="true"><b> fffidan.aliyeva@gmail.com</b></i></p>
        </div>
        <div class="main-4">
            <p>
                <img class="photo" src="{{asset('/uploads/images/anonym247.jpg')}}" alt>
            </p>
            <div class="the_name"><b>Mərdanzadə Şamil Ağaismail</b></div>
            <p><b><i>Back End Developer / Reduktorun yağ sistemi</i></b></p>
            <p><i class="glyphicon glyphicon-phone" aria-hidden="true"></i><b> (+994 70) 559-62-67</b></p>
        </div>
        <div class="main-4">
            <p>
                <img class="photo" src="{{asset('/uploads/images/fed.jpg')}}" alt>
            </p>
            <div class="the_name"><b>Əhmədzadə Fidan Xanım Rafiq</b></div>
            <p><b><i>Front End Developer / Baş reduktorun ümumi xarakteristikası</i></b></p>
            <p><i class="glyphicon glyphicon-envelope" aria-hidden="true"><b> fidanfedka@gmail.com</b></i></p>
        </div>
    </div>
    <div class="footer" style="background-color:  #0C2E3B">
        <p>Kafedra müdürü: Məlikov A.Z.&nbsp;&nbsp;<i class="glyphicon glyphicon-envelope" aria-hidden="true"> agassi.melikov@rambler.ru</i></p>
        <p>Rəhbər: Əhmədov L.N.&nbsp;&nbsp;<i class="glyphicon glyphicon-envelope" aria-hidden="true"> lutfiyar59@mail.ru</i></p>
        <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> (+99412) 497-26-28

        <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i> mail@naa.edu.az

        <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> Baki ş., Mərdakən pr. 30
    </div>
</div>

</body>
</html>

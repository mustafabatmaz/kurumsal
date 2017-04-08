<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<title>Deneme - @yield('title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">

<script src="/javascripts/jquery.js"></script>
<!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="col s12">

                        <ul id="dropdown1" class="dropdown-content">
                            @foreach(App\Category::all() as $category)
                                <li><a href="/katalog/{{$category->slug}}" class="blue-grey-text darken-2">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                        <ul id="dropdown2" class="dropdown-content">
                            @foreach(App\Category::all() as $category)
                                <li><a href="/katalog/{{$category->slug}}" class="blue-grey-text darken-2">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                        <nav class="white">
                          <div class="nav-wrapper">
                            <a href="/" class="brand-logo"><img src="/images/logo.jpg"  height="50px" alt="" style="border:none"></a>
                            <ul class="right hide-on-med-and-down ">
                                <!-- Dropdown Trigger -->
                                <li><a class="dropdown-button blue-grey-text darken-2" href="#!" data-activates="dropdown2">Ürünler<i class="material-icons right">arrow_drop_down</i></a></li>
                                 <li><a href="/hakkimda" class="blue-grey-text darken-2">Hakkımızda</a></li>
                                 <li><a href="/iletisim" class="blue-grey-text darken-2">İletişim</a></li>
                               </ul>
                             <ul class="side-nav" id="mobile-demo">
                             <!-- Mobil Menü -->
                                <li><a class="dropdown-button blue-grey-text darken-2" href="#!" data-activates="dropdown1">Ürünler<i class="material-icons right">arrow_drop_down</i></a></li>
                              <li><a href="/hakkimda" class="blue-grey-text darken-2">Hakkımızda</a></li>
                              <li><a href="/iletisim" class="blue-grey-text darken-2">İletişim</a></li>
                            </ul>
                          </div>
                        </nav>
                        <script>
                        $(".dropdown-button").dropdown();
                        $(".button-collapse").sideNav();
                        </script>

                    </div>
                </div>
                <div class="row" style="padding:0px 20px;">
                    @yield('content')

                </div>
            </div>
        </div>
        <footer>
            <div class="card-panel grey lighten-1">
                <div class="row">
                    <div class="col s12 center-align">
                        <a href="/">Anasayfa</a>
                    </div>
                    <center>Copyright ©2016  All rights reserved.</center>
                </div>
            </div>
        </footer>

</body>
</html>

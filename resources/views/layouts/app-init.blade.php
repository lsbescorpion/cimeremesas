<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Tabares" >
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}"  rel="stylesheet">

    <!-- Add custom CSS here -->
    {{--<link href="{{asset('css/half-slider.css')}}" rel="stylesheet">--}}

    {{----}}
</head>

<body>
<header>
    <figure>
        <div class="logo">

            <img  src="{{url('img/logo.png')}}" width="140px">

        </div>


    </figure>

    <div class="">

    </div>
</header>

<div class="comprar">
    <i  class="icon-c"></i>

</div>
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="margin-top: 70px;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="" href="index.html">Start Bootstrap</a>-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
<br><br><br><br>
<main class="py-4" style="margin-top: 30px;">
    @yield('content')
</main>

<div class="container">

    <div class="row section">
        <div class="col-lg-12">

        </div>
    </div>

    <hr>

    <footer class="footer">
        <div class="container-fluid px-lg-5">
            <div class="row">
                <div class="col-md-9 py-5">
                    <div class="row mt-md-5">
                        <div class="col-md-12">
                            <p class="copyright" style="text-align: center;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> derechos reservados |  <i class="ion-ios-heart" aria-hidden="true"></i> por <a href="" target="_blank">CKC</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">-->
                <!--<h2 class="footer-heading">Request A Quote</h2>-->
                <!--<form action="#" class="contact-form">-->
                <!--<div class="form-group">-->
                <!--<input type="text" class="form-control" placeholder="Your Name">-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<input type="text" class="form-control" placeholder="Your Email">-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<input type="text" class="form-control" placeholder="Subject">-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<button type="submit" class="form-control submit px-3">Send</button>-->
                <!--</div>-->
                <!--</form>-->
                <!--</div>-->
            </div>
        </div>
    </footer>


</div><!-- /.container -->

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
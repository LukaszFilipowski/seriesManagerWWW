<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>{{ config('app.name', 'seriesManager') }}</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('css/contactstyle.css') }}" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('css/faqstyle.css') }}" type="text/css" media="all" />
<link href="{{ asset('css/single.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/medile.css') }}" rel='stylesheet' type='text/css' />
<!-- banner-slider -->
<link href="{{ asset('css/jquery.slidey.min.css') }}" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="all">
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({

		  autoPlay: 3000, //Set AutoPlay to 3 seconds

		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]

		});

	});
</script>
<!-- //banner-bottom-plugin -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/series-ajax.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="{{ route('home') }}"><h1>series<span>Manager</span></h1></a>
			</div>
			<div class="w3_search">
				<form action="#" method="post">
					<input type="text" name="Search" placeholder="aktualnie nieczynne" required="">
					<input type="submit" value="Szukaj">
				</form>
			</div>
			<div class="w3l_sign_in_register">
				<ul>
                                    @if(!Auth::user())
					<li><a href="{{ route('register') }}" data-toggle="modal">Rejestracja</a></li>
					<li><a href="{{ route('login') }}" data-toggle="modal">Logowanie</a></li>
                                    @else
                                    <li>Zalogowany jako {{ Auth::user()->email }} <a href="#">Wyloguj</a></li>
                                    @endif
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->

<!-- nav -->
	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li class="active"><a href="{{ route('home') }}">Home</a></li>

							<li><a href="#">Kategorie</a></li>
							<li><a href="#">Lista seriali</a></li>

							<li><a href="#">Lista użytkowników</a></li>
							<li><a href="#">Kontakt</a></li>
						</ul>
					</nav>
				</div>
			</nav>
		</div>
	</div>
<!-- //nav -->

@if (Session::has('message'))
	<div class="flash alert">
		<p>{{ Session::get('message') }}</p>
    </div>
@endif
@yield('content')

<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>
		</ul>
  </nav>
</div>

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Bądź na bierząco</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<form action="#" method="post">
								<input type="email" name="email" placeholder="Adresik..." required="">
								<input type="submit" value="wysyłamy :VV">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 w3ls_footer_grid_right">
					<a href="#"><h2>Series<span>Manager</span></h2></a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-5 w3ls_footer_grid1_left">
				<p>&copy; 2016-2017 SeriesManager Wszelkie prawa zastrzeżone | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
<!--			<div class="col-md-7 w3ls_footer_grid1_right">
				<ul>
					<li>
						<a href="#">przydatne</a>
					</li>
					<li>
						<a href="#">linki</a>
					</li>
					<li>
						<a href="#">np</a>
					</li>
					<li>
						<a href="#">faq</a>
					</li>

				</ul>
			</div>-->
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>

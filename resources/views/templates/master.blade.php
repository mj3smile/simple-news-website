<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>@yield('title')News ku'</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{url('css/bootstrap.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{url('css/style.css')}}">

		<!-- Flag css for headline -->
		<link type="text/css" rel="stylesheet" href="{{url('flag-css/css/flag-icon.min.css')}}">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="{{url('/')}}" class="logo"><img src="{{url('img/logo.png')}}" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<!-- <li><a href="category.html">News</a></li> -->
							<li><a href="{{url('headline')}}">Headline</a></li>
							<li class="cat-1"><a href="{{url('category/business')}}">Business</a></li>
							<li class="cat-2"><a href="{{url('category/entertainment')}}">Entertainment</a></li>
							<li class="cat-3"><a href="{{url('category/health')}}">Health</a></li>
							<li class="cat-4"><a href="{{url('category/science')}}">Science</a></li>
							<li class="cat-5"><a href="{{url('category/sports')}}">Sports</a></li>
							<li class="cat-6"><a href="{{url('category/technology')}}">Technology</a></li>
						</ul>
						<!-- /nav -->

						<!-- search & aside toggle -->
						<div class="nav-btns">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                            <form action="{{url('search')}}" method="get">
                                <div class="search-form">
									<input class="search-input" type="text" name="q" placeholder="Enter Your Search ...">
									<button class="search-close"><i class="fa fa-times"></i></button>
                                    <input type="submit" style="visibility: hidden;" />
                                </div>
                            </form>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->
			</div>
			<!-- /Nav -->
            @yield('content')
		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="<?php echo url('.'); ?>" class="logo"><img src="<?php echo url('/img/logo.png'); ?>" alt=""></a>
							</div>
							<div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="https://mujahid.my.id">Mujahid Abdillah</a> | This template is made by <a href="https://colorlib.com" target="_blank">Colorlib</a> | The News is powered by <a href="https://newsapi.org" target="_blank">newsAPI.org</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="<?php echo url('js/jquery.min.js'); ?>"></script>
		<script src="<?php echo url('js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo url('js/main.js'); ?>"></script>

	</body>
</html>

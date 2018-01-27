<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<title>Blog</title>
	<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="../css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Poiret+One|Lily+Script+One|Raleway:400,300,500,600,200,700' rel='stylesheet' type='text/css'>
	<script src="../js/jquery-1.11.1.min.js"></script>
	<style>
		html,body,p,h1,h3,h4,h5,h6 { font-family: 'Righteous', cursive; }
	</style>
</head>
<body>
	<div class="head" id="home">
		<div class="container" style="padding-top: 3%;">  
			<div class="main">	
				<div class="wht-head">	
					<div class="logo">
						<span class="menu"> </span>
						<div class="top-menu">
							<nav>
								<ul class="cl-effect-16">
									<li><a class="" href="{{ url('/') }}" data-hover="Posts">Posts</a></li>
									@if(session('isadmin')) <li><a href="{{ url('add') }}" data-hover="Add Post">Add Post</a></li>
									@endif
									@if(!session('id')) <li><a href="{{ url('login') }}" data-hover="Login">Login</a></li>
									@else <li><a href="{{ url('logout') }}" data-hover="Logout">Logout</a></li>
									@endif
									<div class="clearfix"></div>
								</ul>
							</nav>		
						</div>
						<script>
							$( "span.menu" ).click(function() {
								$( ".top-menu" ).slideToggle( "slow", function() {
									// Animation complete.
								});
							});
						</script>
					</div>
					<div class="clearfix"></div>
				</div>
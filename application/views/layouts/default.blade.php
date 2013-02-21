<!DOCTYPE html>
<html lang="de">
<head>
@section('header')
	<meta charset="iso-8859-1">
	<title>{{ $title }} | Online Parking Ticket Appeals | Marist College</title>
	<!-- The below script Makes IE understand the new html5 tags are there and applies our CSS to it -->
	<!--[if IE]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	{{ HTML::style('css/main.css') }}
	<link rel="Stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
@yield_section
</head>
<body>
	<header>
		{{ HTML::image('img/marist-logo.png', 'Marist', array('id' => 'maristHead')); }}
		<h1>Online Parking Appeal System</h1>
	</header>
	<div id="container">
	<article>
		@if(Session::has('alertMessage'))
			<p><span class="notice"><b>{{ Session::get('alertMessage') }}</b></span></p>
		@endif
		
		@yield('content')
	</article>
	<nav>
		@section('navigation')
		<h1>Navigation</h1>
		<p>{{ HTML::link_to_action('appeal@index', 'Home') }}</p>
		<p>{{ HTML::link_to_action('appeal@new', 'Submit An Appeal') }}</p>
		<p>{{ HTML::link_to_action('appeal@myappeals', 'View My Appeals') }}</p>
		<p>{{ HTML::link_to_action('appeal@help', 'Help') }}</p>


		@yield_section
	</nav>
	</div>
	<footer>
    	<p>Online Parking Ticket Appeals for Marist College use only. Copyright &copy; {{ date('Y') }} Marist College. Some icons by <a href='http://p.yusukekamiyamane.com/'>Yusuke Kamiyamane</a>.
	</footer>

</body>
</html>
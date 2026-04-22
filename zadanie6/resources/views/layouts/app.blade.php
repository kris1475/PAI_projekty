<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">
<title>{{ $page_title ?? 'Kalkulator kredytowy' }}</title>

<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body class="is-preload">

<div id="wrapper">

<header id="header">

<div class="content">
<div class="inner">
<span class="icon fa-calculator"></span>
<h1>{{ $page_title ?? 'Kalkulator kredytowy' }}</h1>
<p>{{ $page_description ?? '' }}</p>
</div>
</div>

<nav>
<ul>
<li><a href="#kalkulator">Kalkulator</a></li>
</ul>
</nav>

</header>

<div id="main">

<article id="kalkulator">

@yield('content')

</article>

</div>

<footer id="footer"></footer>

</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/browser.min.js') }}"></script>
<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
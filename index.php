<?php
require_once('vendor/autoload.php');
use Mailgun\Mailgun;
if ($_POST) {
	# code...



# Instantiate the client.
$mgClient = new Mailgun('a1e11246ca5ad163925ed0a4f1439c13-a4502f89-807c5bb6');
$domain = "sandbox1991ea818a384b2fbf1f0eef677a408e.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandbox1991ea818a384b2fbf1f0eef677a408e.mailgun.org>',
                'to'      => 'Nicolas Zalcman <grupomalkasoft@gmail.com>',
                'subject' => 'Contacto Malkasoft',
                'text'    => 'Nombre: '. $_POST['name'].'
                Email: '. $_POST['email']. '
                Mensaje: ' . $_POST['message'] ));

                
}
?>


<!DOCTYPE HTML>
<!--
	Big Picture by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>MalkaSoft E-commerce para restaurantes</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="google-site-verification" content="m9IBdyVTfvsAYmEnhCqjxXazDwMVs-wQWAHmyeMG4IM" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>MalkaSoft</h1>
				<nav>
					<ul>
						<li><a href="#intro">Introducción</a></li>
						<li><a href="#one">Que hacemos?</a></li>
						<li><a href="#two">Funciones</a></li>
						<li><a href="#work">Imagenes</a></li>
						<li><a href="#contact">Contacto</a></li>
					</ul>
				</nav>
			</header>

		<!-- Intro -->
			<section id="intro" class="main style1 dark fullscreen">
				<div class="content">
					<header>
						<img width="150px" src="images/lan.png">
						<h2>MalkaSoft</h2>
					</header>
					<p>Desarrolamos e-commerce para comercios y restaurantes <br />
					Trabajamos constantemente para adaptarnos a las necesidades de nuestros clientes</p>
					<strong> <a href="http://demo.malkasoft.xyz">demo</a></strong>
					<footer>
						<a href="#one" class="button style2 down">Mas</a>
					</footer>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main style2 right dark fullscreen">
				<div class="content box style2">
					<header>
						<h2>Que hacemos?</h2>
					</header>
					<p>Creamos todo tipo de sitios web. Nos especializamos en E-commerce para restaurantes. Tus clientes ahora te van a poder hacer <strong>Pedidos Online</strong> a solo <strong>300$ por mes</strong> </p>
				</div>
				<a href="#two" class="button style2 down anchored">Next</a>
			</section>

		<!-- Two -->
			<section id="two" class="main style2 left dark fullscreen">
				<div class="content box style2">
					
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/4EfTFuuO3ow?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
				<a href="#work" class="button style2 down anchored">Next</a>
			</section>

		<!-- Work -->
			<section id="work" class="main style3 primary">
				<div class="content">
					<header>
						<h2>A solo 300$ por mes</h2>
						<p>Contamos con un sistema de ultima tecnologia</p>
					</header>

					<!-- Gallery  -->
						<div class="gallery">
							<article class="from-left">
								<a href="images/fulls/01.jpg" class="image fit"><img src="images/thumbs/01.jpg" title="The Anonymous Red" alt="" /></a>
							</article>
							<article class="from-right">
								<a href="images/fulls/02.jpg" class="image fit"><img src="images/thumbs/02.jpg" title="Airchitecture II" alt="" /></a>
							</article>
							<article class="from-left">
								<a href="images/fulls/03.jpg" class="image fit"><img src="images/thumbs/03.jpg" title="Air Lounge" alt="" /></a>
							</article>
							<article class="from-right">
								<a href="images/fulls/04.jpg" class="image fit"><img src="images/thumbs/04.jpg" title="Carry on" alt="" /></a>
							</article>
							<article class="from-left">
								<a href="images/fulls/05.jpg" class="image fit"><img src="images/thumbs/05.jpg" title="The sparkling shell" alt="" /></a>
							</article>
							<article class="from-right">
								<a href="images/fulls/06.jpg" class="image fit"><img src="images/thumbs/06.jpg" title="Bent IX" alt="" /></a>
							</article>
						</div>

				</div>
			</section>

		<!-- Contact -->
			<section id="contact" class="main style3 secondary">
				<div class="content">
					<header>
						<h2>Contactate con nosotros</h2>
						<p>Estamos las 24hs a su dispocision</p>
					</header>
					<div class="box">
						<form method="post" action="">
							<div class="fields">
								<div class="field half"><input type="text" name="name" placeholder="Nombre" /></div>
								<div class="field half"><input type="email" name="email" placeholder="Email" /></div>
								<div class="field"><textarea name="message" placeholder="Mensaje" rows="6"></textarea></div>
							</div>
							<ul class="actions special">
								<li><input type="submit" value="Enviar Mensaje" /></li>
							</ul>
						</form>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">

				<!-- Icons -->
					<ul class="icons">
						
						<li><a href="https://www.facebook.com/malkasoft1" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						
					</ul>

				<!-- Menu -->
					<ul class="menu">
						<li>&copy; Malkasoft</li>
					</ul>

			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
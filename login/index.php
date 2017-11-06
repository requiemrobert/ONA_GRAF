
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="HandheldFriendly" content="True">
	<meta http-equiv="cleartype" content="on">
	<meta name="theme-color" content="#009ee3">
	<link rel="stylesheet" type="text/css" href="media/css/login.css">
	<link rel="stylesheet" type="text/css" href="media/css/wave.css">
	<link rel="stylesheet" type="text/css" href="media/css/ripple.css">
	<link rel="stylesheet" type="text/css" href="media/css/font-awesome.css">

	<script src="media/js/jquery-3.2.1.min.js"></script>
	<script src="media/js/login.js"></script>
	<script src="media/js/bootstrap-notify.min.js"></script>
	<script src="media/js/notify.js"></script>

	<title>Login | Global System</title>
</head>
<body>

<main role="main" id="root-app">

<div class="wrapper">
<div class="container">
	<div class="container-sk-cube">
		<div class="sk-wave">
	        <div class="sk-rect sk-rect1"></div>
	        <div class="sk-rect sk-rect2"></div>
	        <div class="sk-rect sk-rect3"></div>
	        <div class="sk-rect sk-rect4"></div>
	        <div class="sk-rect sk-rect5"></div>
	    </div>
	</div>
	<h1 class="mensaje-inicio">Iniciar Sesión</h1>
	<form class="form" method="POST">
		<input type="text" name="user_name" id="user_name" required placeholder="Username" pattern="[\w]+" onkeypress="return blokSpace(event,this)">
		<input type="password" name="password" id="password" placeholder="Password" onkeypress="return blokSpace(event,this)">

		<button type="submit" id="login_bt" class="ripple-button">
			<div class="ripple-container">
	          <span class="ripple-effect"></span>
	        </div>
	        Login
        </button>
	</form>
</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
		<li></li>
	</ul>
</div>
</main>

<script src="media/js/ripple.js"></script>
</body>
</html>

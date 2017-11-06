
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">

	<?php
		  loadCss($data_head);
		  loadScript($data_head);
	?>

	<title><?= $titulo ?></title>
</head>

<body>

	<header class="header">
		<div class="wrapp-flex">
			<div class="logo-header">
				<a href="#"><img src="img/logotipo.jpg" alt="Logotipo"></a>
				<a href="#" class="btn-menu" id="btn-menu"></a>
			</div>
			<div class="content-menu">
				<nav>
				  
			  		<?= render_menu(); ?>

				</nav> 
			</div>
		</div>
	</header>


<div class="main">

	<div class="flex-content-main">

		<nav class="sidebar">

			<div class="profile-face">
					<span><?= render_profile() ?></span>
			</div>

			<div class="profile-name">
				<span>
					<a href="<?= BASE_URL ?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a> <?= $_SESSION['user_name'] ?>
				</span>
			</div>

			<?= render_sub_menu($opciones_sub_menu) ?>

		</nav>

		<section class="content">
			<div class="container">
				<?= $tpl_content; ?>
			</div>
		</section>

	</div>
</div>

	<?= render_footer() ?>

</body>
</html>

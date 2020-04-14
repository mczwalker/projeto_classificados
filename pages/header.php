<?php require 'config.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Classificados</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>		
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="./" class="navbar-brand">Classificados</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					
					<?php if(isset($_SESSION['clogin']) && !empty($_SESSION['clogin'])):?>
					<li>
						<a href="">
							<?php 
								require 'classes/usuarios.class.php';

								$u = new Usuarios();
								$id = $_SESSION['clogin'];
								$nome = $u->exibirNome($id);
								echo 'Bem vindo(a) '.$nome.'!';
							?>
						</a>
					</li>
					<li><a href="meus-anuncios.php">Meus Anúncios</a></li>
					<li><a href="sair.php">Sair</a></li>
					<?php else: ?>
					<li><a href="cadastre-se.php">Cadastre-se</a></li>
					<li><a href="login.php">Login</a></li>
					<?php endif; ?>	
				</ul>
		</nav>
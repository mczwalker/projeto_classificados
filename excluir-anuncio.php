<?php
require 'config.php';
if(empty($_SESSION['clogin'])){
	header("Location: login.php");
	exit;
}
	
	require 'classes/anuncios.class.php';

	if(isset($_GET['id']) && !empty($_GET['id'])){
		$a = new Anuncios();
		$a->excluirAnuncio($_GET['id']);
	}

	header("Location: meus-anuncios.php");
?>
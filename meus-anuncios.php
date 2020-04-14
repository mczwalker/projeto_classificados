<?php require 'pages/header.php'; ?>
<?php
	if(empty($_SESSION['clogin'])){
		?>
		<script type="text/javascript">window.location.href="login.php";</script>
		<?php
		exit;
	}
?>


<div class="container">
	<h1>Meus Anúncios</h1>
	<br/>
	<a href="add-anuncio.php" class="btn btn-default">Adicionar Anúncio</a><br/><br/><br/>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Título</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<?php
		require 'classes/anuncios.class.php';
		$a = new Anuncios();
		$anuncios = $a->getMeusAnuncios();

		foreach($anuncios as $anuncio):
		?>
		<tr>
			<td>
				<?php if(!empty($anuncio['url'])): ?>
					<td><img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" border="0"/></td>
				<?php else: ?>
					<td><img src="assets/images/default.jpg" height="50" border="0"/></td>
				<?php endif; ?>
			</td>
			<td><?php echo $anuncio['titulo']; ?></td>
			<td><?php echo number_format($anuncio['valor'], 2); ?></td>
			<td>
				<a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-default">Editar</a>
				<a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-danger">Excluir</a>
			</td>
		</tr>
		<?php
		endforeach;
		?>

	</table>
</div>
<?php require 'pages/footer.php'; ?>
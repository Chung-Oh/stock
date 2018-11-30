<?php 
require_once '../Helpers/user-session.php';

if (userIsLogged()) : ?>

<?php require_once 'Templates/header.php' ?>
	<main>
		<div class="row msg-home">
			<div class="col-12">
				<h2>Bem-vindo ao Sistema de Controle de Estoque.</h2>
				<p>Selecione uma das opções do Menu para começar a usar o Sistema.</p>
			</div>
		</div>
	</main>
<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
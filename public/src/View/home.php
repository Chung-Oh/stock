<?php 
require_once '../Helpers/show-alert.php';
require_once '../Helpers/user-session.php';

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<main>
		<?php showAlert('success'); showAlert('danger') ?>
		<div class="row msg-home">
			<div class="col-12">
				<h2>Bem-vindo ao StockSystem.</h2>
				<p>Selecione uma das opções do Menu para começar a usar o Sistema.</p>
			</div>
		</div>
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
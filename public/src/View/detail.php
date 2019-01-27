<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/show-alert.php';
require_once '../Helpers/date.php';
require_once '../Session/user-session.php';
require_once '../Session/category-session.php';

try {
	// Session abaixo serve para redirecionar os Form criação e edição
	$_SESSION['path'] = basename(__FILE__);
	// Verifica tempo da Sessão
	sessionExist();
	$categorys = CategoryDao::list();
	if (haveSessionCategory()) {
		$catList = new CategoryDao($_SESSION['name'], $_SESSION['id']);
		$catList->loadDetails();
	} else {
		$catList = array(array());
	}
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<main>
		<!-- Verifica se tem Categoria -->
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'Detail/main-top.php' ?>
			<!-- Verifica se tem Produto -->
			<?php if (empty($catList->products)) : ?>
				<?php require_once 'Detail/main-create.php' ?>
				<?php require_once 'Detail/form-create.php' ?>
				<?php require_once 'Product/main-product-empty.php' ?>
			<?php else : ?>
				<?php require_once 'Detail/form-edit.php' ?>
				<?php require_once 'Detail/form-delete.php' ?>
				<?php require_once 'Detail/main-info-head.php' ?>
				<?php require_once 'Detail/main-info-button.php' ?>
				<?php require_once 'Detail/main-info-body.php' ?>
			<?php endif ?>
			<!-- Fim Produto -->
		<?php else : ?>
			<?php require_once 'Product/main-category-empty.php' ?>
		<?php endif ?>
		<!-- Fim Categoria -->
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
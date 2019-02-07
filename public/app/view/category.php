<?php 
require_once '../../src/global.php';
require_once '../../src/Dao/CategoryDao.php';
require_once '../../src/Helpers/show-alert.php';
require_once '../../src/Session/user-session.php';
require_once '../../src/Session/category-session.php';

try {
	cleanSessionCategory();
	// Verifica tempo da Sessão
	sessionExist();
	// Destruindo authorized para redefinir nova senha
	unset($_SESSION['authorized']);
	$categorys = CategoryDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'templates/header.php' ?>
	<?php require_once 'category/form-create.php' ?>
	<main>
		<?php require_once 'category/main-top.php' ?>
		<!-- Verifica se tem Categoria -->
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'category/form-edit.php' ?>
			<?php require_once 'category/form-delete.php' ?>
			<?php require_once 'category/main-table.php' ?>
		<?php else : ?>
			<?php require_once 'category/main-empty.php' ?>
		<?php endif ?>
		<!-- Fim -->
	</main>
	<?php require_once 'templates/button-go-top.php' ?>
	<?php require_once 'templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
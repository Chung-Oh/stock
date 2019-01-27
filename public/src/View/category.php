<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/show-alert.php';
require_once '../Session/user-session.php';
require_once '../Session/category-session.php';

try {
	cleanSessionCategory();
	// Verifica tempo da Sessão
	sessionExist();
	$categorys = CategoryDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<?php require_once 'Category/form-create.php' ?>
	<main>
		<?php require_once 'Category/main-top.php' ?>
		<!-- Verifica se tem Categoria -->
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'Category/form-edit.php' ?>
			<?php require_once 'Category/form-delete.php' ?>
			<?php require_once 'Category/main-table.php' ?>
		<?php else : ?>
			<?php require_once 'Category/main-empty.php' ?>
		<?php endif ?>
		<!-- Fim -->
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
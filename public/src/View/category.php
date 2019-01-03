<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';
require_once '../Helpers/show-alert.php';

try {
	$categorys = CategoryDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<?php require_once 'Templates/main-category-form-create.php' ?>
	<?php require_once 'Templates/main-category-form-edit.php' ?>
	<?php require_once 'Templates/main-form-delete.php' ?>
	<main>
		<?php showAlert('success'); showAlert('danger') ?>
		<?php require_once 'Templates/main-category-top.php' ?>
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'Templates/main-category-table.php' ?>
		<?php else : ?>
			<?php require_once 'Templates/main-category-empty.php' ?>
		<?php endif ?>
	</main>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
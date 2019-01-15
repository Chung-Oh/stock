<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/show-alert.php';
require_once '../Helpers/user-session.php';
require_once '../Helpers/category-session.php';

try {
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
		<?php showAlert('success'); showAlert('danger') ?>
		<?php require_once 'Detail/main-top.php' ?>
		<?php if (empty($catList->products)) : ?>
			<?php require_once 'Detail/main-create.php' ?>
			<?php require_once 'Product/form-create.php' ?>
			<?php require_once 'Detail/main-empty.php' ?>
		<?php else : ?>
			<?php require_once 'Detail/main-info-head.php' ?>
		<?php endif ?>
	</main>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
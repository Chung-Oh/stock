<?php 
require_once '../global.php';
require_once '../Dao/UserDao.php';
require_once '../Helpers/show-alert.php';
require_once '../Session/user-session.php';

try {
	// $date = date("d/m/Y");
	// $hour = date("H:i:s");
	// echo "Data: " . $date . "<br>" . "Horas : " . $hour;
	// die();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<?php require_once 'User/main-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
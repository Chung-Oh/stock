<?php 
require_once 'src/Helpers/show-alert.php';
require_once 'src/Session/user-session.php';
// Sessão usada na validação de usuário
$_SESSION['path'] = basename(__FILE__);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>StockSystem</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="app/css/reset.css">
	<link rel="stylesheet" href="app/css/login/login-base.css">
	<link rel="stylesheet" href="app/css/login/login-title.css">
	<link rel="stylesheet" href="app/css/login/login-alert.css">
	<link rel="stylesheet" href="app/css/login/login-form.css">
	<link rel="stylesheet" href="app/css/login/login-button.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class="interface">
		<?php showAlert('success'); ?>			
		<?php if(!userIsLogged()) : ?>
			<div class="title-shake">
				<div class="title-fly">
					<h1>Bem vindo</h1>			
				</div>			
			</div>
			<?php showAlert('danger'); ?>
			<form action="src/Route/login-enter.php" method="post">
				<table class="table-form">
					<tbody class="table-body">
						<tr>
							<td class="cel-name cel-icon">
								<input class="name input-icon" type="text" name="name" placeholder="Usuário" pattern="[a-zA-Z]{4,50}" title="Mín 4 Máx 50 letras. Ex: Bill" autocomplete="off" required>
								<i class="fas fa-user"></i>
							</td>
						</tr>
						<tr>
							<td class="cel-password cel-icon">
								<input class="password input-icon" type="password" name="password" placeholder="Senha" pattern="\w{3,50}" title="Mín 3 Máx 50 caracteres. Ex: test123" required>
								<i class="fas fa-lock"></i>
							</td>					
						</tr>
						<tr>
							<td class="btn">
								<button>LOGIN</button>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		<?php else : ?>
			<div class="btn-return">
				<p><a href="src/View/home.php">Retornar ao Sistema</a></p>
			</div>
		<?php endif ?>
	</div>
</body>
</html>
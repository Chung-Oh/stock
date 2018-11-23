<?php 
require_once '../Helpers/user-session.php';

if (userIsLogged()) : ?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<title>Controle Estoque</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="icon" href="favicon.png" type="image/png">
		<link rel="stylesheet" href="../../app/css/reset.css">
		<link rel="stylesheet" href="../../app/css/cabecalho.css">
	</head>
	<body>
		<div>
			<header>
				<div>
					<h1><a href="../../index.php">Controle Estoque</a></h1>
				</div>
			</header>
		</div>
		<div>
			<p><a href="../Route/login-out.php">Sair</a></p>
		</div>
	</body>
	</html>
<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
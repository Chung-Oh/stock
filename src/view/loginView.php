<?php  ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Controle Estoque</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="app/css/reset.css">
	<link rel="stylesheet" href="app/css/login/login-desk.css">
	<link rel="stylesheet" href="app/css/login/login-tablet.css">    
	<link rel="stylesheet" href="app/css/login/login-mobile.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class="interface">
		<div class="title-shake">
			<div class="title-fly">
				<h1>Bem vindo</h1>			
			</div>			
		</div>
		<form action="#" method="post">
			<table class="table-form">
				<tbody class="table-body">
					<tr>
						<td class="cel-name cel-icon">
							<input class="name input-icon" type="text" name="name" placeholder="Usuário" pattern="[a-zA-Z]{4,}" title="Mínimo 4 letras" autocomplete="off" required>
							<i class="fas fa-user"></i>
						</td>
					</tr>
					<tr>
						<td class="cel-password cel-icon">
							<input class="password input-icon" type="password" name="password" placeholder="Senha" required>
							<i class="fas fa-lock"></i>
						</td>					
					</tr>
					<tr>
						<td class="btn">
							<input class="btn-primary" type="submit" value="LOGIN">
						</td>
					</tr>					
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>
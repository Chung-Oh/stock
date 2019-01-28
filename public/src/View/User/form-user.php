<section id="formUser" class="user-form">
	<i class="fas fa-user"></i>
	<i class="fas fa-lock"></i>
	<div class="row btn">
		<div class="col-6 new-item new-item_danger">
			<button class="btn-danger">Cancelar</button>
		</div>
	</div>
	<div class="row container">
		<div class="col-6 form-user">
			<form action="../Route/#.php" method="post">
				<input class="name input-icon" type="text" name="name" placeholder="Usuário atual" pattern="[a-zA-Z]{4,50}" title="Mín 4 Máx 50 letras. Ex: Bill" autocomplete="off" onfocus="this.value='';" required>
				<input class="password input-icon" type="password" name="password" placeholder="Senha atual" pattern="\w{3,50}" title="Mín 3 Máx 50 caracteres. Ex: test123" onfocus="this.value='';" required>
				<input class="btn-form" type="submit" value="Verificar">
			</form>
		</div>
	</div>	
</section>
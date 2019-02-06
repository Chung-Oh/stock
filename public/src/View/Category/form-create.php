<section id="formCreate" class="category-form-create">
	<i class="fas fa-bookmark"></i>
	<div class="row btn">
		<div class="col-6 new-item new-item_danger">
			<button class="btn-danger">Cancelar</button>
		</div>
	</div>
	<div class="row container-category">
		<div class="col-6 form-category">
			<form action="../Route/category-create.php" method="post">
				<input class="data data-category" type="text" name="name" title="Mínimo 2, máximo 50 caracteres. Ex: Notebook" pattern="^([\w\s\dáâãéêíóõôúç].{0,50})" placeholder ="Nova Categoria" onfocus="this.value='';" required>
				<input class="btn-form" type="submit" value="Cadastrar">
			</form>
		</div>
	</div>	
</section>
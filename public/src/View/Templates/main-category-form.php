<section id="categoryForm">
	<div class="row btn">
		<div class="col-6 new-item new-item_danger">
			<button class="btn-danger" onclick="hiddenForm()">Cancelar</button>
		</div>
	</div>
	<div class="row form-create">
		<div class="col-6 create-category">
			<form action="../Route/category-create.php" method="post">
				<input class="category" type="text" name="name" title="Mínimo 2, máximo 50 caracteres. Ex: Notebook" pattern="^([A-Z][\w\s\dáâéêíóôú].{0,50})" placeholder ="Nova Categoria" onfocus="this.value='';" required>
				<input class="btn-create" type="submit" value="Cadastrar">
			</form>
		</div>
	</div>	
</section>
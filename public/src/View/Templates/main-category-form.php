<section id="categoryForm">
	<div class="row btn">
		<div class="col-6 new-category new-category_danger">
			<button class="btn-danger" onclick="hiddenForm()">Cancelar</button>
		</div>
	</div>
	<div class="row form-create">
		<div class="col-6 create-category">
			<form action="../Route/category-create.php" method="post">
				<input class="category" type="text" name="name" title="Mínimo 2, máximo 50 letras" pattern="\D{2,50}" placeholder ="Nova Categoria" required>
				<input class="btn-create" type="submit" value="Cadastrar">
			</form>
		</div>
	</div>	
</section>
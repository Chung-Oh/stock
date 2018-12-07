<section class="category-form-edit">
	<div class="row btn">
		<div class="col-6 new-category new-category_danger">
			<button class="btn-danger" onclick="hiddenFormEdit()">Cancelar</button>
		</div>
	</div>
	<div class="row form-create">
		<div class="col-6 create-category">
			<form action="../Route/category-update.php" method="post">
				<input id="idEdit" type="hidden" name="id">
				<input id="categoryEdit" class="category" type="text" name="name" title="Mínimo 2, máximo 50 letras" pattern="\D{2,50}" placeholder ="Novo Nome" required>
				<input class="btn-create" type="submit" value="Editar">
			</form>
		</div>
	</div>	
</section>
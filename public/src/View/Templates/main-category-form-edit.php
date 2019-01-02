<section id="categoryFormEdit">
	<div class="row btn">
		<div class="col-6 new-item new-item_danger">
			<button class="btn-danger">Cancelar</button>
		</div>
	</div>
	<div class="row container">
		<div class="col-6 form-category">
			<form action="../Route/category-update.php" method="post">
				<input id="newName" class="data data-category" type="text" name="name" title="Mínimo 2, máximo 50 caracteres. Ex: Notebook" pattern="^([A-Z][\w\s\dáâéêíóôú].{0,50})" placeholder ="Novo Nome" onfocus="this.value='';" required>
				<input id="idFormEdit" type="hidden" name="id">
				<input id="oldName" type="hidden" name="oldName">
				<input class="btn-form" type="submit" value="Editar">
			</form>
		</div>
	</div>	
</section>
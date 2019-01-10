<section id="formEdit" class="product-form-create">
	<div class="row btn">
		<div class="col-6 new-item new-item_danger">
			<button class="btn-danger">Cancelar</button>
		</div>
	</div>
	<div class="row container">
		<div class="col-6 form-product">
			<form action="../Route/product-edit.php" method="post">
				<input id="newName" class="data" type="text" name="name" title="Mínimo 2, máximo 50 caracteres. Ex: Notebook" pattern="^([A-Z][\w\s\dáâéêíóôú].{0,50})" placeholder ="Novo Produto" onfocus="this.value='';" required>
				<input id="newDesc" class="data" type="text" name="description" title="Mínimo 2, máximo 250 caracteres. Ex: 8GB RAM, 32GB INTERNO, OCTACORE" pattern="^([A-Z][\w\s\dáâéêíóôú].{0,250})" placeholder="Descrição" onfocus="this.value='';" required>
				<input id="newWeight" class="data" type="text" name="weight" title="Mínimo 2, máximo 100 caracteres. Ex: 160 GRAMA" pattern="^([\w\s\dáâéêíóôú].{0,100})" placeholder="Peso" onfocus="this.value='';" required>
				<input id="newColor" class="data" type="text" name="color" title="Mínimo 2, máximo 25 caracteres. Ex: Verde" pattern="^([A-Z][\w\s].{0,25})" placeholder="Cor" onfocus="this.value='';" required>
				<select id="newCategoryId" name="category_id" required>
					<option selected disabled>Selecione categoria:</option>
					<?php foreach($categorys as $category) : ?>
						<option value="<?php echo $category->getId() ?>"><?php echo $category->getName() ?></option>
					<?php endforeach ?>
				</select>
				<input id="id" type="hidden" name="id">
				<input id="oldName" type="hidden" name="oldName">
				<input id="oldDesc" type="hidden" name="oldDesc">
				<input id="oldWeight" type="hidden" name="oldWeight">
				<input id="oldColor" type="hidden" name="oldColor">
				<input id="oldCategoryId" type="hidden" name="oldCategoryId">
				<input class="btn-form" type="submit" value="Editar">
			</form>
		</div>
	</div>	
</section>
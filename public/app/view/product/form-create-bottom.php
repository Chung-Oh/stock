				<input class="data" type="text" name="name" title="Mínimo 2, máximo 50 caracteres. Ex: Notebook" pattern="^([\w\s\dáâãéêíóõôúç].{0,50})" placeholder ="Novo Produto" onfocus="this.value='';" required>
				<input class="data" type="text" name="description" title="Mínimo 2, máximo 255 caracteres. Ex: 8GB RAM, 32GB INTERNO, OCTACORE..." pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="Descrição" onfocus="this.value='';" required>
				<input class="data" type="text" name="weight" title="Mínimo 2, máximo 100 caracteres. Ex: 160 grama" pattern="^([\w\s\dáâãéêíóõôúç].{0,50})" placeholder="Peso" onfocus="this.value='';" required>
				<input class="data" type="text" name="color" title="Mínimo 2, máximo 25 caracteres. Ex: Verde" pattern="^([\w\s\dáâãéêíóõôúç].{0,25})" placeholder="Cor" onfocus="this.value='';" required>
				<select name="category_id" required>
					<option value="" selected disabled>Selecione categoria:</option>
					<?php foreach($categorys as $category) : ?>
						<option value="<?php echo $category->getId() ?>"><?php echo $category->getName() ?></option>
					<?php endforeach ?>
				</select>
				<input class="btn-form" type="submit" value="Cadastrar">
			</form>
		</div>
	</div>	
</section>
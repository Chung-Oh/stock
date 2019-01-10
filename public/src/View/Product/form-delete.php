<section id="formDelete">
	<div class="row form-delete">
		<form class="col-6 delete-product" action="../Route/product-delete.php" method="post">
			<h3 class="title-delete">Deseja realmente excluir?</h3>
			<p class="msg-delete"></p>
			<input id="idFormDelete" type="hidden" name="id">
			<input id="nameFormDelete" type="hidden" name="name">
			<input id="descFormDelete" type="hidden" name="description">
			<input id="weightFormDelete" type="hidden" name="weight">
			<input id="colorFormDelete" type="hidden" name="color">
			<input id="categoryIdFormDelete" type="hidden" name="category_id">
			<div class="options">
				<p class="not">Não</p>
				<input class="yes" type="submit" value="Sim"></input>				
			</div>
		</form>
	</div>
</section>
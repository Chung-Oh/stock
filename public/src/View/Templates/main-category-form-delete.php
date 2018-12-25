<section id="categoryFormDelete">
	<div class="row form-delete">
		<form class="col-6 delete-category" action="../Route/category-delete.php" method="post">
			<h3 class="title-delete">Deseja realmente excluir?</h3>
			<p class="msg-delete"></p>
			<input id="idFormDelete" type="hidden" name="id">
			<input id="nameFormDelete" type="hidden" name="name">
			<div class="options">
				<p class="not">Não</p>
				<input class="yes" type="submit" value="Sim"></input>				
			</div>
		</form>
	</div>
</section>
<section id="categoryFormDelete">
	<div class="row form-delete">
		<form class="col-6 delete-category" action="../Route/category-delete.php" method="post">
			<h3 class="msg-delete">Deseja realmente excluir <?php echo "Teste" ?>?</h3>
			<input type="hidden" name="id">
			<input type="hidden" name="name">
			<div class="options">
				<p class="not">Não</p>
				<input class="yes" type="submit" value="Sim"></input>				
			</div>
		</form>
	</div>
</section>
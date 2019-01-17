<section class="row detail-head">
	<div class="info-head">
		<p><strong class="info-head-strong">Id:</strong><?php echo $_SESSION['id'] ?></p>			
	</div>
	<div class="info-head">
		<p><strong class="info-head-strong">Categoria:</strong><?php echo $_SESSION['name'] ?></p>
	</div>	
	<div class="info-head">
		<p><strong class="info-head-strong">Produtos:</strong><?php echo count($catList->products) ?></p>
	</div>
</section>
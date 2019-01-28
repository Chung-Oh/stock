<section class="row detail-head">
	<div class="info detail-head-info">
		<p><strong class="info-head-strong">Id:</strong><?php echo $catList->category->getId() ?></p>			
	</div>
	<div class="info detail-head-info">
		<p><strong class="info-head-strong">Categoria:</strong><?php echo $catList->category->getName() ?></p>
	</div>	
	<div class="info detail-head-info">
		<p><strong class="info-head-strong">Produtos:</strong><?php echo count($catList->products) ?></p>
	</div>
</section>
<!-- Detalhes da Data -->
<section class="row detail-head detail-date">
	<div class="info info-date">
		<p><strong class="info-head-strong">Criado:</strong><?php echo dateFull($catList->category->getCreatedAt()) ?></p>
	</div>
	<div class="info info-date">
		<p><strong class="info-head-strong">Atualizado:</strong><?php echo dateFull($catList->category->getUpdatedAt()) ?></p>
	</div>
</section>
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
<!-- Detalhes da Criação -->
<section class="row detail-head detail-create">
	<div class="info info-sub">
		<p><strong class="info-head-strong">Criado:</strong><?php echo dateFull($catList->category->getCreatedAt()) ?></p>
	</div>
	<div class="info info-sub">
		<p><strong class="info-head-strong">Autor criação:</strong><?php echo afterFirst($catList->category->getCreatedBy()) ?></p>
	</div>
</section>
<!-- Detalhe Atualização -->
<section class="row detail-head detail-update">
	<div class="info info-sub">
		<p><strong class="info-head-strong">Atualizado:</strong><?php echo dateFull($catList->category->getUpdatedAt()) ?></p>
	</div>
	<div class="info info-sub">
		<p><strong class="info-head-strong">Autor atualização:</strong><?php echo afterFirst($catList->category->getUpdatedBy()) ?></p>
	</div>
</section>
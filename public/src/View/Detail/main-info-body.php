<section class="row detail-body">
	<div class="info-body">
		<?php foreach($catList->products as $product) : ?>
			<details class="info-row">
				<summary><?php echo $product->getName() ?></summary>
				<p><strong class="info-body-strong">Id :</strong><em><?php echo $product->getId() ?></em></p>
				<p><strong class="info-body-strong">Descrição :</strong><em><?php echo $product->getDesc() ?></em></p>
				<p><strong class="info-body-strong">Peso :</strong><em><?php echo $product->getWeight() ?></em></p>
				<p><strong class="info-body-strong">Cor :</strong><em><?php echo $product->getColor() ?></em></p>
				<p>
					<strong class="info-body-strong">Criado :</strong><em><?php echo dateFull($product->getCreatedAt()) ?></em>
					<strong class="info-body-strong"> &rArr; Autor :</strong><em><?php echo afterFirst($product->getCreatedBy()) ?></em>
				</p>
				<p>
					<strong class="info-body-strong">Atualizado :</strong><em><?php echo dateFull($product->getUpdatedAt()) ?></em>
					<strong class="info-body-strong"> &rArr; Autor :</strong><em><?php echo afterFirst($product->getUpdatedBy()) ?></em>
				</p>
				<p hidden><?php echo $product->getCategoryId() ?></p>
				<p hidden><?php echo $product->getCategoryName() ?></p>
				<button id="edit" class="fas fa-pencil-alt"></button>
				<button id="delete" class="fas fa-trash-alt"></button>
			</details>
		<?php endforeach ?>
	</div>
</section>
<section class="msg-table-search invisible">
	<h3 class="title-table-search">Esse produto não existe no banco de dados.</h3>
</section>
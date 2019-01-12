<section class="row">
	<div class="col-12">
		<table class="table-items table-product">	
			<thead>
				<tr>
					<th class="order">Id</th>
					<th class="order">Nome</th>
					<th>Descrição</th>
					<th class="order">Peso</th>
					<th class="order">Cor</th>
					<th class="order">Categoria</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody id="table-product">
				<?php foreach ($products as $product) : ?>
					<tr class="info-row">
						<td class="info-id"><?php echo $product->getId() ?></td>
						<td class="info-name"><?php echo customName($product->getName()) ?></td>
						<td class="info-name" hidden><?php echo $product->getName() ?></td>
						<td class="info-desc"><?php echo customName($product->getDesc()) ?></td>
						<td class="info-desc" hidden><?php echo $product->getDesc() ?></td>
						<td class="info-weight"><?php echo $product->getWeight() ?></td>
						<td class="info-color"><?php echo $product->getColor() ?></td>
						<td class="info-category-name"><?php echo $product->getCategoryName() ?></td>
						<td class="info-category-id" hidden>
							<input type="hidden" value="<?php echo $product->getCategoryId() ?>">
						</td>
						<td><button id="edit" class="fas fa-pencil-alt"></button></td>
						<td><button id="delete" class="fas fa-trash-alt"></button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>
<section class="msg-table-search invisible">
	<h3 class="title-table-search">Esse produto não existe no banco de dados.</h3>
</section>
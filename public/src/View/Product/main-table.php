<section class="row table">
	<div class="col-12">
		<table class="table-product">	
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
			<tbody>
				<?php foreach ($products as $product) : ?>
					<tr class="info-row">
						<td class="info-id"><?php echo $product->getId() ?></td><!-- 0 -->
						<td class="info-name"><?php echo $product->getName() ?></td><!-- 1 -->
						<td class="info-desc"><?php echo customString($product->getDesc(), 150) ?></td><!-- 2 -->
						<td class="info-weight"><?php echo $product->getWeight() ?></td><!-- 3 -->
						<td class="info-color"><?php echo $product->getColor() ?></td><!-- 4 -->
						<td class="info-category-name"><?php echo $product->getCategoryName() ?></td><!-- 5 -->
						<!-- Abaixo para Form -->
						<td class="info-desc" hidden><?php echo $product->getDesc() ?></td><!-- 6 -->
						<td class="info-category-id" hidden><!-- 7 -->
							<input type="hidden" value="<?php echo $product->getCategoryId() ?>">
						</td>
						<!-- Fim -->
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
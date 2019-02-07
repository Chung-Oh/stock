<section class="row table">
	<div class="col-12">
		<table class="table-category">
			<caption class="caption-category">.: Clique sobre nome da categoria para mais detalhes :.</caption>
			<thead>
				<tr>
					<th class="order">Id</th>
					<th class="order">Nome</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categorys as $category) : ?>
					<tr class="info-row">
						<td class="info-id"><?php echo $category->getId() ?></td>
						<td class="info-name">
							<a href="../../src/Route/category-select.php/?id=<?php echo $category->getId() ?>"><?php echo $category->getName() ?></a>
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
	<h3 class="title-table-search">Essa categoria não existe no banco de dados.</h3>
</section>
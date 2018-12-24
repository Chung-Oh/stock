<section class="row">
	<div class="col-12 table">
		<table class="table-items">
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
							<a href="../Route/category-select.php/?id=<?php echo $category->getName() ?>"><?php echo substr($category->getName(), 0, 50) ?></a>
						</td>
						<td><button id="edit" class="fas fa-pencil-alt"></button></td>
						<td><button class="fas fa-trash-alt"></button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>
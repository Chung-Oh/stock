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
						<td>
							<button id="edit" class="fas fa-pencil-alt">
								<input type="hidden" name="name" value="<?php echo $category->getName() ?>">
							</button>
						</td>
						<td>
							<form action="../Route/category-delete.php" method="post">
								<input type="hidden" name="id" value="<?php echo $category->getId() ?>">
								<input type="hidden" name="name" value="<?php echo $category->getName() ?>">
								<button class="fas fa-trash-alt"></button>		
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>
<section class="row">
	<div class="col-12 table">
		<table class="table-items table-product">	
			<thead>
				<tr>
					<th class="order">Id</th>
					<th class="order">Nome</th>
					<th>Descrição</th>
					<th class="order">Peso</th>
					<th>Cor</th>
					<th class="order">Categoria</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $product) : ?>
					<tr>
						<td id="idProduct"><?php echo $product->getId() ?></td>
						<td id="nameProduct"><?php echo substr($product->getName(), 0, 50) ?></td>
						<td><?php echo substr($product->getDesc(), 0, 50) ?></td>
						<td><?php echo $product->getWeight() ?></td>
						<td><?php echo $product->getColor() ?></td>
						<td><?php echo $product->getCategoryId() ?></td>
						<td>
							<button id="edit" class="fas fa-pencil-alt">
								<input type="hidden" name="name" value="<?php echo $product->getName() ?>">
							</button>
						</td>
						<td>
							<form action="../Route/product-delete.php" method="post">
								<input type="hidden" name="id" value="<?php echo $product->getId() ?>">
								<input type="hidden" name="name" value="<?php echo $product->getName() ?>">
								<button class="fas fa-trash-alt"></button>		
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>
<section class="msg-table-search invisible">
	<h3 class="title-table-search">Esse produto não existe no banco de dados.</h3>
</section>
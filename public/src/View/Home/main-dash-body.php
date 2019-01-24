<section class="row dash-table">
	<div class="info-table">
		<table>
			<thead>
				<tr>
					<th class="order">Categoria</th>
					<th class="order">Qtd</th>
					<th class="order">%</th>
					<th>Produto</th>
				</tr>			
			</thead>
			<tbody>
				<?php foreach ($categorys as $cat) : ?>
					<tr class="info-row">
						<td><?php echo $cat->getName() ?></td>
						<td><?php echo countProduct($cat->getName(), $cat->getId()) ?></td>
						<td><?php echo percentage($cat->getName(), $cat->getId(), $products) ?></td>
						<td>
							<meter min="0" max="<?php echo count($products) ?>" value="<?php echo countProduct($cat->getName(), $cat->getId()) ?>"></meter>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>
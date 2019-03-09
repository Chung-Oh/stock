<?php
use Src\Helpers\Convert;
use Src\Helpers\Services;
?>

<section class="row dash-table">
	<div class="info-table">
		<table>
			<thead>
				<tr>
					<th class="order">Qtd</th>
					<th class="order">Categoria</th>
					<th>Produto</th>
					<th>%</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categorys as $cat) : ?>
					<tr class="info-row">
						<td><?php echo Services::countProduct($cat->getName(), $cat->getId()) ?></td>
						<td><?php echo $cat->getName() ?></td>
						<td>
							<meter min="0" max="<?php echo count($products) ?>" value="<?php echo Services::countProduct($cat->getName(), $cat->getId()) ?>"></meter>
						</td>
						<td><?php echo Convert::percentage($cat->getName(), $cat->getId(), $products) ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>
<section class="row dash-table">
	<div class="info-table">
		<table>
			<thead>
				<tr>
					<th class="order">Nome</th>
					<th class="order">Qtd</th>
					<th class="order">%</th>
					<th>Medidor</th>
				</tr>			
			</thead>
			<tbody>
				<?php foreach ($categorys as $cat) : ?>
					<tr class="info-row">
						<td><?php echo $cat->getName() ?></td>
						<td>5</td>
						<td>70</td>
						<td><meter value="0.7" color="blue">70%</meter></td>		
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</section>
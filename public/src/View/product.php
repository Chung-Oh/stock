<?php 
require_once '../global.php';
//require_once '../Dao/ProductDao.php';
require_once '../Helpers/user-session.php';
require_once '../Helpers/show-alert.php';

// try {
// 	$products = ProductDao::list();
// } catch (PDOException $e) {
// 	Erro::handler($e);
// }

if (userIsLogged()) : ?>

<?php require_once 'Templates/header.php' ?>
<main>
	<?php showAlert('success'); showAlert('danger') ?>
	<section class="row">
		<div class="col-12">
			<h2>Produtos</h2>
		</div>
	</section>
	<section class="row btn">
		<div class="col-6 new-item">
			<button class="btn-primary" onclick="showForm()">Criar Novo Produto</button>
		</div>
	</section>
<!-- Aqui vai meus Formulários -->
	<section class="row">
		<div class="col-12 table">
			<table class="table-items">	
				<thead>
					<tr>
						<th class="filter">Id</th>
						<th class="filter">Nome</th>
						<th>Descrição</th>
						<th class="filter">Peso</th>
						<th>Dimensão</th>
						<th class="filter">Categoria</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($products as $product) : ?>
						<tr>
							<td id="idProduct"><?php echo $product->getId() ?></td>
							<td id="nameProduct">
								<a href="../Route/product-select.php/?id=<?php echo substr($product->getName(), 0, 50) ?>"></a>
							</td>
							<td><?php echo substr($product->getDesc(), 0, 50) ?></td>
							<td><?php echo $product->getWeight() ?></td>
							<td><?php echo $product->getDimension() ?></td>
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
</main>
<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
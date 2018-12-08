<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';
require_once '../Helpers/show-alert.php';

// $cat = CategoryDao::list();
// foreach ($cat as $lin) {
// 	$c = $lin;
// }
// echo '<pre>';
// print_r($c->getName());
// //echo '=========================================================================================';
// //print_r();
// die();

try {
	$categorys = CategoryDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

<?php require_once 'Templates/header.php' ?>
<main>
	<?php showAlert('success'); showAlert('danger') ?>
	<section class="row">
		<div class="col-12">
			<h2>Categorias</h2>
		</div>			
	</section>
	<section id="callFormCreate" class="row btn">
		<div class="col-6 new-item">
			<button class="btn-primary" onclick="showForm()">Criar Nova Categoria</button>
		</div>
	</section>
	<?php require_once 'Templates/main-category-form.php' ?>
	<?php require_once 'Templates/main-category-form-edit.php' ?>
	<section class="row">
		<div class="col-12 table">
			<table class="table-items">
				<thead>
					<tr>
						<th class="filter">Id</th>
						<th class="filter">Nome</th>
						<th>Editar</th>
						<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($categorys as $category) : ?>
						<tr>
							<td id="id"><?php echo $category->getId() ?></td>
							<td id="name">
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
</main>
<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
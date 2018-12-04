<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';
require_once '../Helpers/show-alert.php';

try {
	$categorys = CategoryDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

<?php require_once 'Templates/header.php' ?>
	<main>
		<?php showAlert('success'); showAlert('danger') ?>
		<div class="row">
			<div class="col-12">
				<h2>Categorias</h2>
			</div>			
		</div>
		<div id="callForm" class="row btn">
			<div class="col-6 new-category">
				<a class="btn-primary" onclick="showForm()" href="#">Criar Nova Categoria</a>
			</div>
		</div>
		<?php require_once 'Templates/main-category-form.php' ?>
		<div class="row">
			<div class="col-12 table">
				<table class="table-category">
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
								<td><?php echo $category['id'] ?></td>
								<td><a href="#"><?php echo $category['name'] ?></a></td>
								<td><a href="#"><i class="fas fa-pencil-alt"></i></a></td>
								<td><a href="#"><i class="fas fa-trash-alt"></i></a></i></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</main>
<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
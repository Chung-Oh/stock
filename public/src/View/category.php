<?php 
require_once '../Helpers/user-session.php';

if (userIsLogged()) : ?>

<?php require_once 'Templates/header.php' ?>
	<main>
		<div class="row">
			<div class="col-12">
				<h2>Categorias</h2>
			</div>			
		</div>
		<div class="row btn">
			<div class="col-6 new-category">
				<a class="btn-primary" href="category-create.php">Criar Nova Categoria</a>
			</div>
		</div>
		<div class="row container">
			<div class="col-12 table">
				<table class="table-category">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><a href="#">Eletrônicos</a></td>
							<td><a href="#"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="#"><i class="fas fa-trash-alt"></i></a></i></td>
						</tr>
						<tr>
							<td>2</td>
							<td><a href="#">Roupas</a></td>
							<td><a href="#"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						<tr>
							<td>3</td>
							<td><a href="#">Calçados</a></td>
							<td><a href="#"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						<tr>
							<td>4</td>
							<td><a href="#">Filmes</a></td>
							<td><a href="#"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						<tr>
							<td>5</td>
							<td><a href="#">Brinquedos</a></td>
							<td><a href="#"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
						<tr>
							<td>6</td>
							<td><a href="#">Suplementos</a></td>
							<td><a href="#"><i class="fas fa-pencil-alt"></i></a></td>
							<td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</main>
<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>
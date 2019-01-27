<?php 
require_once '../Helpers/convert.php';
require_once '../Session/user-session.php';
require_once '../Session/category-session.php';
/*** Usuário ***/
function logInUser($current)
{
	// Registra entrada do Usuário
	beginAccess();
	// Iniciando tempo da Sessão
	getTime();
	// Verificando Usuário
	$user = $current->verifyUser();
	// Setando nome e id na Seção
	logUser($user->getUser()->getId(), $user->getUser()->getName());
	// Instanciando para gravar Login
	$logger = new LoggerDao(
		$_SESSION['user_id'],
		$_SESSION['log_in']
	);
	$logger->in();
	$_SESSION['success'] = "Usuário <span>{$_POST['name']}</span> logado com sucesso.";
	header("Location: ../View/home.php");
}

function logOutUser($current)
{
	// Registra saída do Usuário
	endAccess();
	$current->out($_SESSION['log_out']);
	// Destrói a sessão do Usuário
	userLogOut();
	$_SESSION['success'] = 'Deslogado com sucesso.';
	header("Location: ../../index.php");
}

function redefineUser($current)
{
	// LOGICA
}
/*** Categoria ***/
function loadCategory($current)
{
	$category = CategoryDao::load($current);
	// Personalizando retorno do nome na Session com 25 caracteres
	$name = customString($category->getName(), 25);
	// Setando id e nome na session, abaixo
	setCategory($category->getId(), $category->getName());
	$_SESSION['success'] = "Segue abaixo lista detalhada de <span>{$name}</span>";
	header("Location: ../../View/detail.php");
}

function newCategory($current)
{
	if ($current->new()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/category.php");
	} 	
}

function updateCategory($current)
{
	if ($current->update()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/category.php");
	}
}

function deleteCategory($current)
{
	if ($current->delete()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/category.php");
	}	
}
/*** Produto ***/
function newProduct($current)
{
	if ($current->new()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/product.php");
	}
}

function updateProduct($current)
{
	if ($current->update()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/product.php");
	}
}

function deleteProduct($current)
{
	if ($current->delete()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/product.php");
	}
}
/*** Detalhe ***/
function newProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->new()) {
		setCategory($category->getId(), $category->getName());
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/detail.php");
	}
}
function updateProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->update()) {
		setCategory($category->getId(), $category->getName());
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/detail.php");	
	}
}

function deleteProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->delete()) {
		setCategory($category->getId(), $category->getName());
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/detail.php");
	}
}
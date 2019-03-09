<?php

use Src\Dao\CategoryDao;
use Src\Dao\LoggerDao;
use Src\Helpers\Convert;
/*** Usuário ***/
function logInUser($current)
{
	header("Location: ../../app/view/home.php");
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
	$name = afterFirst($_POST['name']);
	$_SESSION['success'] = "Usuário <span>{$name}</span> logado com sucesso.";
}

function logOutUser($current)
{
	header("Location: ../../index.php");
	// Registra saída do Usuário
	endAccess();
	$current->out($_SESSION['log_out']);
	// Destrói a sessão do Usuário
	userLogOut();
	$_SESSION['success'] = 'Deslogado com sucesso.';
}

function verifyCurrentUser($current)
{
	// Verificando autencidade do Usuário
	header("Location: ../../app/view/redefine.php");
	$_SESSION['authorized'] = "OK";
	$_SESSION['success'] = "Usuário e senha válido, redefina novo <span>nome</span> e <span>senha.</span>";
}

function redefineUser($current)
{
	// Redefinição Nome e Senha
	if ($current->update($_SESSION['user_id'])) {
		header("Location: ../../app/view/user.php");
		$_SESSION['success'] = "Redefinição do <span>Usuário</span> realizado com sucesso.";
	}
}
/*** Categoria ***/
function loadCategory($current)
{
	$category = CategoryDao::load($current);
	// Personalizando retorno do nome na Session com 25 caracteres
	$name = Convert::customString($category->getName(), 25);
	// Setando id e nome na session, abaixo
	setCategory($category->getId(), $category->getName());
	header("Location: ../../../app/view/detail.php");
	$_SESSION['success'] = "Segue abaixo lista detalhada de <span>{$name}</span>";
}

function newCategory($current)
{
	if ($current->new()) {
		header("Location: ../../app/view/category.php");
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
	}
}

function updateCategory($current)
{
	if ($current->update()) {
		header("Location: ../../app/view/category.php");
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
	}
}

function deleteCategory($current)
{
	if ($current->delete()) {
		header("Location: ../../app/view/category.php");
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
	}
}
/*** Produto ***/
function newProduct($current)
{
	if ($current->new()) {
		header("Location: ../../app/view/product.php");
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
	}
}

function updateProduct($current)
{
	if ($current->update()) {
		header("Location: ../../app/view/product.php");
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
	}
}

function deleteProduct($current)
{
	if ($current->delete()) {
		header("Location: ../../app/view/product.php");
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
	}
}
/*** Detalhe ***/
function newProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->new()) {
		header("Location: ../../app/view/detail.php");
		setCategory($category->getId(), $category->getName());
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
	}
}

function updateProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->update()) {
		header("Location: ../../app/view/detail.php");
		setCategory($category->getId(), $category->getName());
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
	}
}

function deleteProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->delete()) {
		header("Location: ../../app/view/detail.php");
		setCategory($category->getId(), $category->getName());
		$name = Convert::customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
	}
}
// Seção callFormCreate, botão chama Form create
const btnCallFormCreate = document.getElementById("callFormCreate");
// Botão da seção acima que invoca o Form
const btnAction = document.getElementById("callForm");
// Botão do Form para cancelar
const btnCancel = document.querySelectorAll(".btn-danger");
// Form de criação
const formCreate = document.getElementById("formCreate");
// Input do Form para nova Categoria
const data = document.querySelectorAll(".data");

const showFormCreate = () => process(btnCallFormCreate, formCreate, data);

const hiddenFormCreate = () => process(formCreate, btnCallFormCreate, data);

btnAction && btnCancel
	? (btnAction.addEventListener("click", () => showFormCreate()),
		btnCancel[0].addEventListener("click", () => hiddenFormCreate()))
	: null;
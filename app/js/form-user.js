// Sessão do Botão
const userButton = document.querySelector(".user-button");
// Botão que invoca o Form
const btnFormUser = document.querySelector(".show-user-form");
// Form usuário
const formUser = document.getElementById("formUser");
// Botão cancelar
const btnCancelUser = document.getElementById("btnCancelUser");
// Inputs nome e senha
const inputs = document.querySelectorAll(".input-icon");

btnCancelUser
	? btnCancelUser.addEventListener("click", () =>
		process(formUser, userButton, inputs))
	: null;

btnFormUser
	? btnFormUser.addEventListener("click", () =>
		process(userButton, formUser, inputs))
	: null;
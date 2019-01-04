import {fadeIn, fadeOut} from './helpers/manipulate-form.js';
// Seção callFormCreate
export const btnFormCreate = document.getElementById("callFormCreate");
// Botão da seção acima que invoca o Form
const btnAction = document.getElementById("callForm");
// Botão do Form para cancelar
export const btnCancel = document.querySelectorAll(".btn-danger");
// Form de criação 
export const formCreate = document.getElementById("formCreate");
// Input do Form para nova Categoria
const data = document.querySelector(".data");

if (btnAction && btnCancel) {
	btnAction.addEventListener("click", () => showForm());
	btnCancel[0].addEventListener("click", () => hiddenForm());
}

function showForm() {
	fadeOut(btnFormCreate, 1);
	setTimeout(() => {
		fadeIn(formCreate, 1);
	}, 700);
}

function hiddenForm() {
	data.value = "";
	fadeOut(formCreate, 1);
	setTimeout(() => {
		fadeIn(btnFormCreate, 1);
	}, 700);
}
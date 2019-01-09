import {fadeIn, fadeOut} from './services/fade-elements.js';
import {select, testSelect} from './helpers/select.js';
// Seção callFormCreate, botão chama Form create
export const btnCallFormCreate = document.getElementById("callFormCreate");
// Botão da seção acima que invoca o Form
const btnAction = document.getElementById("callForm");
// Botão do Form para cancelar
export const btnCancel = document.querySelectorAll(".btn-danger");
// Form de criação 
export const formCreate = document.getElementById("formCreate");
// Input do Form para nova Categoria
export const data = document.querySelectorAll(".data");

const process = (form1, form2) => {
	data.forEach(d => d.value = "");
	testSelect();
	fadeOut(form1, 1);
	setTimeout(() => {
		fadeIn(form2, 1);
	}, 700);
}

const showForm = () => {
	process(btnCallFormCreate, formCreate);
}

const hiddenForm = () => {
	process(formCreate, btnCallFormCreate);
}

if (btnAction && btnCancel) {
	btnAction.addEventListener("click", () => showForm());
	btnCancel[0].addEventListener("click", () => hiddenForm());
}
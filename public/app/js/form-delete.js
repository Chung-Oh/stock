import {fadeIn, fadeOut} from './helpers/fade-elements.js';
import {tbody} from './form-edit.js';
// Form delete
const formDelete = document.getElementById("formDelete");
// Nome categoria Mensagem deleção
const msgDelete = document.querySelector(".msg-delete");
// Botão cancelar deleção
const btnCancel = document.querySelector(".not");
// Dados do Form abaixo
const idDelete = document.getElementById("idFormDelete");
const nameDelete = document.getElementById("nameFormDelete");
const descFormDelete = document.getElementById("descFormDelete");
const weightFormDelete = document.getElementById("weightFormDelete");
const colorFormDelete = document.getElementById("colorFormDelete");
const categoryIdFormDelete = document.getElementById("categoryIdFormDelete");

const category = () => {
	tbody 
		? tbody.addEventListener("click", () => {
			const target = event.target;
			const currentTarget = target.parentNode.parentNode;
			if (target.id == "delete") {
				setTimeout(() => {
					fadeIn(formDelete, 1);
					msgDelete.innerHTML = currentTarget.children[1].textContent.trim();
					idDelete.value = currentTarget.children[0].textContent.trim();
					nameDelete.value = currentTarget.children[1].textContent.trim();
					formDelete.style.display="flex";
				}, 700);
			}})
		: null;
}

const product = () => {
	tbody 
		? tbody.addEventListener("click", () => {
			const target = event.target;
			const currentTarget = target.parentNode.parentNode;
			if (target.id == "delete") {
				setTimeout(() => {
					fadeIn(formDelete, 1);
					msgDelete.innerHTML = currentTarget.children[1].textContent.trim();
					idDelete.value = currentTarget.children[0].textContent.trim();
					nameDelete.value = currentTarget.children[1].textContent.trim();
					descFormDelete.value = currentTarget.children[6].textContent.trim();
					weightFormDelete.value = currentTarget.children[3].textContent.trim();
					colorFormDelete.value = currentTarget.children[4].textContent.trim();
					categoryIdFormDelete.value = currentTarget.children[7].children[0].value;
					formDelete.style.display="flex";
				}, 700);
			}})
		: null;	
}

const typeFormDelete = () => tbody.id == "table-category" ? category() : product();

tbody ? typeFormDelete() : null;

btnCancel 
	? btnCancel.addEventListener("click", () => fadeOut(formDelete, 1)) 
	: null;	
import {fadeIn, fadeOut} from './helpers/fade-elements.js';
import {details, tbody} from './form-edit.js';
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
		? tbody.addEventListener("click", event => {
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
		? tbody.addEventListener("click", event => {
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
				}, 700);
			}})
		: null;	

	details
		? details.addEventListener("click", event => {
			const target = event.target;
			const currentTarget = target.parentNode;
			if (target.id == "delete") {
				setTimeout(() => {
					fadeIn(formDelete, 1);
					msgDelete.innerHTML = currentTarget.children[0].textContent.trim();
					idDelete.value = currentTarget.children[1].children[1].textContent.trim();
					nameDelete.value = currentTarget.children[0].textContent.trim();
					descFormDelete.value = currentTarget.children[2].children[1].textContent.trim();
					weightFormDelete.value = currentTarget.children[3].children[1].textContent.trim();
					colorFormDelete.value = currentTarget.children[4].children[1].textContent.trim();
					categoryIdFormDelete.value = currentTarget.children[5].textContent.trim();
				}, 700);
			}
		})
		: null;
}
// Verifica qual tipo de Tabela
const typeFormDelete = () => 
	tbody.parentNode.classList.contains("table-category") ? category() : product();
// Caso não tenha Tabela retornar função Product(acima)
tbody ? typeFormDelete() : product();

btnCancel 
	? btnCancel.addEventListener("click", () => fadeOut(formDelete, 1)) 
	: null;	
import {fadeIn, fadeOut} from './helpers/manipulate-form.js';
import {tbody} from './form-category-edit.js';
// Form delete
const formDelete = document.getElementById("formDelete");
// Nome categoria Mensagem deleção
const msgDelete = document.querySelector(".msg-delete");
// Botão cancelar deleção
const btnCancel = document.querySelector(".not");
// Id categoria deleção
const idDelete = document.getElementById("idFormDelete") 
// Nome categoria deleção
const nameDelete = document.getElementById("nameFormDelete");

if (tbody) {
	tbody.addEventListener("click", () => {
		let target = event.target;
		let currentTarget = target.parentNode.parentNode;
		if (target.id == "delete") {
			setTimeout(() => {
				fadeIn(formDelete, 1);
				msgDelete.innerHTML = currentTarget.children[1].textContent.trim();
				idDelete.value = currentTarget.children[0].textContent.trim();
				nameDelete.value = currentTarget.children[1].textContent.trim();
				formDelete.style.display="flex";
			}, 700);
		}
	});	
}

if (btnCancel) {
	btnCancel.addEventListener("click", () => {
		fadeOut(formDelete, 1);
	});	
}
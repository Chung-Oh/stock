import {btnFormCreate, formCreate, btnCancel} from './form-category.js';
import {fadeIn, fadeOut} from './helpers/manipulate-form.js';
// Form de edição
const formEdit = document.getElementById("categoryFormEdit");
// Corpo da Tabela, onde vai escutar os eventos
export const tbody = document.querySelector("tbody");
// ID da categoria a ser alterado dentro do Form
const inputId = document.getElementById("idFormEdit");
// Nome velho
const oldName = document.getElementById("oldName");
// Novo nome no Form
const newName = document.getElementById("newName");

if (tbody) {
	btnCancel[1].addEventListener("click", () => hiddenForm());	
	tbody.addEventListener("click", event => {
		let target = event.target;
		let currentTarget = target.parentNode.parentNode;
		if (target.id == "edit") {
			fadeOut(btnFormCreate, 1);
			setTimeout(() => {
				fadeIn(formEdit, 1);
				inputId.value = currentTarget.children[0].textContent.trim();
				oldName.value = currentTarget.children[1].children[0].textContent.trim();
				newName.value = currentTarget.children[1].children[0].textContent.trim();
			}, 700);
			fadeOut(formCreate);
		}
	});		
}

function hiddenForm() {
	fadeOut(formEdit, 1);
	setTimeout(() => {
		fadeIn(btnFormCreate, 1);
	}, 700);
}
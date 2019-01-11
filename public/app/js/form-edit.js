import {btnCallFormCreate, formCreate, btnCancel} from './form-create.js';
import {fadeIn, fadeOut} from './services/fade-elements.js';
// Corpo da Tabela, onde vai escutar os eventos
export const tbody = document.querySelector("tbody");
// Form edição
const formEdit = document.getElementById("formEdit");
// Novos dados no Form abaixo
const newName = document.getElementById("newName");
const newDesc = document.getElementById("newDesc");
const newWeight = document.getElementById("newWeight");
const newColor = document.getElementById("newColor");
const newCategoryId = document.getElementById("newCategoryId");
// ID da categoria a ser alterado dentro do Form
const id = document.getElementById("id");
// Dados que irão ser editado abaixo
const oldName = document.getElementById("oldName");
const oldDesc = document.getElementById("oldDesc");
const oldWeight = document.getElementById("oldWeight");
const oldColor = document.getElementById("oldColor");
const oldCategoryId = document.getElementById("oldCategoryId");

const showForm = typeForm => {
	btnCancel[1].addEventListener("click", () => hiddenForm());	
	tbody.addEventListener("click", event => {
		const target = event.target;
		const currentTarget = target.parentNode.parentNode;
		if (target.id == "edit") {
			fadeOut(btnCallFormCreate, 1);
			setTimeout(() => {
				fadeIn(formEdit, 1);
				typeForm(currentTarget);
			}, 700);
			fadeOut(formCreate);
		}
	});		
}

const hiddenForm = () => {
	fadeOut(formEdit, 1);
	setTimeout(() => {
		fadeIn(btnCallFormCreate, 1);
	}, 700);
}

const category = target => {
	newName.value = target.children[1].children[0].textContent.trim();
	id.value = target.children[0].textContent.trim();
	oldName.value = target.children[1].children[0].textContent.trim();
}

const product = target => {
	// Abaixo dados a ser editado
	newName.value = target.children[1].textContent.trim();
	newDesc.value = target.children[2].textContent.trim();
	newWeight.value = target.children[3].textContent.trim();
	newColor.value = target.children[4].textContent.trim();
	newCategoryId.children[0].textContent = target.children[5].textContent.trim();
	// Abaixo coloca o Value da categoria na tag option
	newCategoryId.children[0].setAttribute("value",target.children[6].children[0].value);
	id.value = target.children[0].textContent.trim();
	oldName.value = target.children[1].textContent.trim();
	oldDesc.value = target.children[2].textContent.trim();
	oldWeight.value = target.children[3].textContent.trim();
	oldColor.value = target.children[4].textContent.trim();
	oldCategoryId.value = target.children[6].children[0].value;
}

const pageAnalysis = () => {
	if (!tbody) {
		console.log('Desenvolver Dashboard');
	} else if (tbody.id == "table-category") {
		showForm(category);
	} else if (tbody.id == "table-product") {
		showForm(product);
	}		
}

pageAnalysis();
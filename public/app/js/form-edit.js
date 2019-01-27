import {btnCallFormCreate, formCreate, btnCancel} from './form-create.js';
import {fadeIn, fadeOut} from './helpers/fade-elements.js';
// Corpo da Tabela, onde vai escutar os eventos
export const tbody = document.querySelector("tbody");
// Botão page Detalhes
export const details = document.querySelector(".detail-body");
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

const hiddenFormDetail = () => {
	fadeOut(formEdit, 1);
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
	newCategoryId.children[0].setAttribute("value",target.children[7].children[0].value);
	id.value = target.children[0].textContent.trim();
	oldName.value = target.children[1].textContent.trim();
	oldDesc.value = target.children[6].textContent.trim();
	oldWeight.value = target.children[3].textContent.trim();
	oldColor.value = target.children[4].textContent.trim();
	oldCategoryId.value = target.children[7].children[0].value;
}
// Para page Detalhes
const productDetails = target => {
	// Abaixo dados a ser editado
	newName.value = target.children[0].textContent.trim();
	newDesc.value = target.children[2].children[1].textContent.trim();
	newWeight.value = target.children[3].children[1].textContent.trim();
	newColor.value = target.children[4].children[1].textContent.trim();
	// Abaixo coloca o Value da categoria na tag option
	newCategoryId.children[0].setAttribute("value",target.children[7].textContent.trim());
	newCategoryId.children[0].textContent = target.children[8].textContent.trim();
	id.value = target.children[1].children[1].textContent.trim();
	oldName.value = target.children[0].textContent.trim();
	oldDesc.value = target.children[2].children[1].textContent.trim();
	oldWeight.value = target.children[3].children[1].textContent.trim();
	oldColor.value = target.children[4].children[1].textContent.trim();
	oldCategoryId.value = target.children[7].textContent.trim();
}

const pageAnalysis = () => {
	if (details) {
		showForm(productDetails);
	} else if (!tbody) {
		console.log('No table');
	} else if (tbody.parentNode.classList.contains("table-category")) {
		showForm(category);
	} else if (tbody.parentNode.classList.contains("table-product")) {
		showForm(product);
	}
}

const showForm = typeForm => {
	// Cancelar Form page Detalhe
	if (btnCancel[0]) {
		btnCancel[0].addEventListener("click", () => hiddenFormDetail());
	}
	// Cancelar Form page Categoria e Produto
	if (btnCancel[1]) {
		btnCancel[1].addEventListener("click", () => hiddenForm());			
	}
	// Page Categoria e Produto
	if (tbody) {
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
	// Page Detalhe
	if (details) {
		details.addEventListener("click", event => {
			const target = event.target;
			const currentTarget = target.parentNode;
			if (target.id == "edit") {
				setTimeout(() => {
					fadeIn(formEdit, 1);
					typeForm(currentTarget);
				}, 700);
			}
		});		
	}
}

pageAnalysis();
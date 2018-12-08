// Botão da seção callFormCreate
let btnFormCreate = document.getElementById("callFormCreate");
// Form de criação 
let formCreate = document.getElementById("categoryForm");
// Form de edição 
let formEdit = document.querySelector(".category-form-edit");
// Botão invoca o Form
let btnEdit = document.querySelectorAll("#edit");
// Lista de id da tabela
let id = document.querySelectorAll("#id");
// Lista de nome da tabela
let names = document.querySelectorAll("#name");
// ID da categoria a ser alterado dentro do Form
let inputId = document.getElementById("idFormEdit");
// Novo nome no Form
let inputName = document.getElementById("newName");

btnEdit.forEach(btn => {
	btn.addEventListener("click", function(event) {
		// Botão chama Form criação
		fadeOut(btnFormCreate, 1);
		setTimeout(function() {
			fadeIn(formEdit, 1);
			let target = event.target;
			let dad = target.parentNode.parentNode;
			inputId.value = dad.children[0].textContent.trim();
			inputName.value = dad.children[1].textContent.trim();
		}, 700);
		// Form criação
		fadeOut(formCreate);
	}, true);
});

function hiddenFormEdit() {
	data.value = '';
	fadeOut(formEdit, 1);
	setTimeout(function() {
		fadeIn(btnFormCreate, 1);
	}, 700);
}
/** btnFormCreate(botão seção callFormCreate) e formCreate(Form criação) do arquivo form-category **/
// Form de edição 
let formEdit = document.querySelector(".category-form-edit");
// Botão invoca o Form
let btnEdit = document.querySelectorAll("#edit");
// ID da categoria a ser alterado dentro do Form
let inputId = document.getElementById("idFormEdit");
// Nome velho
let oldName = document.getElementById("oldName");
// Novo nome no Form
let newName = document.getElementById("newName");

btnEdit.forEach(btn => {
	btn.addEventListener("click", event => {
		// Botão chama Form criação
		fadeOut(btnFormCreate, 1);
		setTimeout(() => {
			fadeIn(formEdit, 1);
			let target = event.target;
			let dad = target.parentNode.parentNode;
			inputId.value = dad.children[0].textContent.trim();
			oldName.value = dad.children[1].textContent.trim();
			newName.value = dad.children[1].textContent.trim();
		}, 700);
		// Form criação
		fadeOut(formCreate);
	}, true);
});

function hiddenFormEdit() {
	data.value = '';
	fadeOut(formEdit, 1);
	setTimeout(() => {
		fadeIn(btnFormCreate, 1);
	}, 700);
}
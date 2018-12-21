/** btnFormCreate(botão seção callFormCreate) e formCreate(Form criação) do arquivo form-category **/
// Form de edição 
let formEdit = document.querySelector(".category-form-edit");
// Corpo da Tabela, onde vai escutar os eventos
let tbody = document.querySelector("tbody");
// ID da categoria a ser alterado dentro do Form
let inputId = document.getElementById("idFormEdit");
// Nome velho
let oldName = document.getElementById("oldName");
// Novo nome no Form
let newName = document.getElementById("newName");

tbody.addEventListener("click", event => {
	let target = event.target;
	if (target.id == "edit") {
		// Botão chama Form criação
		fadeOut(btnFormCreate, 1);
		setTimeout(() => {
			let currentTarget = target.parentNode.parentNode;
			fadeIn(formEdit, 1);
			inputId.value = currentTarget.children[0].textContent;
			oldName.value = currentTarget.children[1].children[0].textContent;
			newName.value = currentTarget.children[1].children[0].textContent;
		}, 700);
		// Form criação
		fadeOut(formCreate);
	}
});

function hiddenFormEdit() {
	data.value = '';
	fadeOut(formEdit, 1);
	setTimeout(() => {
		fadeIn(btnFormCreate, 1);
	}, 700);
}
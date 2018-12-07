// Botão da seção callFormCreate
let btnFormCreate = document.getElementById("callFormCreate");
// Form de edição 
let formEdit = document.querySelector(".category-form-edit");
// Botão invoca o Form
let btnEdit = document.querySelectorAll("#edit");
// Lista de id da tabela
let id = document.querySelectorAll("#id");
// Lista de nome da tabela
let names = document.querySelectorAll("#name");
// ID da categoria a ser alterado dentro do Form
let inputId = document.getElementById("idEdit");
// Novo nome no Form
let inputName = document.getElementById("categoryEdit");

btnEdit.forEach(btn => {
	btn.addEventListener("click", function(event) {
		let target = event.target;
		let dad = target.parentNode.parentNode;
		inputId.value = dad.children[0].textContent;
		inputName.value = dad.children[1].textContent;
		// console.log(event.target);
		// btnFormCreate.style.display = "none";
		// formEdit.style.display = "block";	
		showForm() {
			fadaOut(btnFormCreate, 1);
			setTimeout(function() {
				fadeIn(formEdit, 1);
			}, 700);
		}
	}, true);
});

function hiddenFormEdit() {
	// btnFormCreate.style.display = "flex";
	// formEdit.style.display = "none";	
	hiddenForm() {
		data.value = '';
		fadaOut(formEdit, 1);
		setTimeout(function() {
			fadeIn(btnFormCreate, 1);
		}, 700);
	}	
}
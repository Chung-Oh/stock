(function formCategoryDelete() {
	// Form delete
	let formDelete = document.getElementById("categoryFormDelete");
	// Nome categoria Mensagem deleção
	let msgDelete = document.querySelector(".msg-delete");
	// Botão cancelar deleção
	let btnCancel = document.querySelector(".not");
	// Id categoria deleção
	let idDelete = document.getElementById("idFormDelete") 
	// Nome categoria deleção
	let nameDelete = document.getElementById("nameFormDelete");

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
})();
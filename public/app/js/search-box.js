// Ocultar input na Home
(function showSearchBox() {
	let navBar = document.querySelectorAll(".page-action");
	if (window.location.href == "http://localhost:8000/src/View/home.php") {
		navBar[2].style.display="none";
	} 
})();

(function search() {
	let inputs = document.querySelectorAll(".search");
	let rows = document.querySelectorAll(".info-row");
	inputs.forEach(search => {
		search.addEventListener("input", function() {
			if (this.value.length > 0) {
				for (let i = 0; i < rows.length; i++) {
					let row = rows[i];
					let tdName = row.querySelector(".info-name");
					let name = tdName.textContent.trim();
					let expression = new RegExp(this.value, "i");		
					if (!expression.test(name)) {
						row.classList.add("invisible");
						messageTableEmpty();
					} else {
						row.classList.remove("invisible");
					}
				}	
			} else {
				for (let i = 0; i < rows.length; i++) {
					let row = rows[i];
					row.classList.remove("invisible");
				}
			}
		});	
	});
})();
// Limpar input de Pesquisa
function cleanSearch() {
	let inputs = document.querySelectorAll(".search");
	let rows = document.querySelectorAll(".info-row");
	inputs.forEach(search => {
		search.value = "";
		for (let i = 0; i < rows.length; i++) {
			let row = rows[i];
			row.classList.remove("invisible");
			messageTableEmpty();
		}
	});
}
// Mensagem quando nome da Pesquisa não existe
function messageTableEmpty() {
	let info = document.querySelectorAll(".info-row");
	let invisible = document.querySelectorAll(".info-row.invisible");
	let msg = document.querySelector(".msg-table-search");
	if (info.length == invisible.length) {
		msg.classList.remove("invisible");
	} else {
		msg.classList.add("invisible");
	}
}
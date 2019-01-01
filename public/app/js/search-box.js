import {rowsTable} from './helpers/table-order.js';
import {messageTableEmpty} from './message-table-empty.js';

const inputs = document.querySelectorAll(".search");
// Ocultar input na Home
(function showSearchBox() {
	const navBar = document.querySelectorAll(".page-action");
	if (window.location.href == "http://localhost:8000/src/View/home.php") {
		navBar[2].style.display="none";
	} 
})();

(function search() {
	inputs.forEach(search => {
		search.addEventListener("input", function() {
			if (this.value.length > 0) {
				for (let i = 0; i < rowsTable.length; i++) {
					let row = rowsTable[i];
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
				for (let i = 0; i < rowsTable.length; i++) {
					let row = rowsTable[i];
					row.classList.remove("invisible");
				}
			}
		});	
	});
})();
// Limpar caixas de Pesquisa
inputs.forEach(search => {
	search.addEventListener("focus", function() {
		search.value = "";
		for (let i = 0; i < rowsTable.length; i++) {
			let row = rowsTable[i];
			row.classList.remove("invisible");
			messageTableEmpty();
		}
	});
});
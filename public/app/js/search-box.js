import {messageTableEmpty} from './helpers/msg-table-empty.js';
import {rowsTable} from './table-listens.js';

const inputs = document.querySelectorAll(".search");

const empty = row => {
	row.classList.add("invisible");
	messageTableEmpty(rowsTable);
}

const notEmpty = row => {
	row.classList.remove("invisible");
	messageTableEmpty(rowsTable);
}
// Ocultar input na Home
(function showSearchBox() {
	const navBar = document.querySelectorAll(".page-action");
	window.location.href == "http://localhost:8000/src/View/home.php" 
		? navBar[2].style.display="none"
		: null;
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
					!expression.test(name)
						? empty(row)
						: row.classList.remove("invisible");
				}	
			} else {
				for (let i = 0; i < rowsTable.length; i++) {
					let row = rowsTable[i];
					notEmpty(row);
				}
			}
		});	
	});
})();
// Limpar caixas de Pesquisa
inputs.forEach(search => {
	search.addEventListener("focus", () => {
		inputs[0].value = "";
		inputs[1].value = "";
		for (let i = 0; i < rowsTable.length; i++) {
			let row = rowsTable[i];
			notEmpty(row);
		}
	});
});
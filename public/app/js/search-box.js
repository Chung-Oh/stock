import {messageTableEmpty} from './helpers/msg-empty.js';
import {rowsTable} from './table-listens.js';
import {details} from './form-edit.js';

const inputs = document.querySelectorAll(".search");
// Ocultar input na Home
(function showSearchBox() {
	const navBar = document.querySelectorAll(".page-action");
	window.location.pathname == "/src/View/home.php" 
		? navBar[2].style.display="none"
		: null;
})();

const empty = (row, context) => {
	row.classList.add("invisible");
	messageTableEmpty(context);
}

const notEmpty = (row, context) => {
	row.classList.remove("invisible");
	messageTableEmpty(context);
}

const pageDetail = () => {
	inputs.forEach(search => {
		search.addEventListener("input", function() {
			const detailList = details.children[0].children;
			if (this.value.length > 0) {
				for (let i = 0; i < details.children[0].children.length; i++) {
					let row = details.children[0].children[i];
					let name = row.children[0].textContent.trim();
					let expression = new RegExp(this.value, "i");
					!expression.test(name)
						? empty(row, detailList)
						: row.classList.remove("invisible");
				}
			} else {
				for (let i = 0; i < details.children[0].children.length; i++) {
					let row = details.children[0].children[i];
					notEmpty(row, detailList);
				}
			}
		});	
	});		
}

const pageCategoryProduct = () => {
	inputs.forEach(search => {
		search.addEventListener("input", function() {
			if (this.value.length > 0) {
				for (let i = 0; i < rowsTable.length; i++) {
					let row = rowsTable[i];
					let tdName = row.querySelector(".info-name");
					let name = tdName.textContent.trim();
					let expression = new RegExp(this.value, "i");
					!expression.test(name)
						? empty(row, rowsTable)
						: row.classList.remove("invisible");
				}	
			} else {
				for (let i = 0; i < rowsTable.length; i++) {
					let row = rowsTable[i];
					notEmpty(row, rowsTable);
				}
			}
		});	
	});
}
// Limpar caixas de Pesquisa
inputs.forEach(search => {
	search.addEventListener("focus", () => {
		inputs[0].value = "";
		inputs[1].value = "";
		for (let i = 0; i < rowsTable.length; i++) {
			let row = rowsTable[i];
			if (window.location.pathname == "/src/View/detail.php") {
				notEmpty(row, details);
			} else {
				notEmpty(row, rowsTable);	
			}
		}
	});
});
// Verifica qual Page está para chamar a lógica de busca
(function search() {
	if (window.location.pathname == "/src/View/detail.php") {
		pageDetail();
	} else {
		pageCategoryProduct();
	}
})();
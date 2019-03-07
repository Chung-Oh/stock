import { messageTableEmpty } from './helpers/msg-empty.js';
import { rowsTable } from './table-listens.js';
import { details } from './form-edit.js';

const inputsSearch = document.querySelectorAll(".search");

const empty = (row, context) => {
	row.classList.add("invisible");
	messageTableEmpty(context);
}

const notEmpty = (row, context) => {
	row.classList.remove("invisible");
	messageTableEmpty(context);
}

const pageDetail = () => {
	inputsSearch.forEach(search => {
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
	inputsSearch.forEach(search => {
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
inputsSearch.forEach(search => {
	search.addEventListener("focus", () => {
		inputsSearch[0].value = "";
		inputsSearch[1].value = "";
		for (let i = 0; i < rowsTable.length; i++) {
			let row = rowsTable[i];
			window.location.pathname == "/app/view/detail.php"
				? notEmpty(row, details)
				: notEmpty(row, rowsTable);
		}
	});
});
// Verifica qual Page está para chamar a lógica de busca
(function search() {
	window.location.pathname == "/app/view/detail.php"
		? pageDetail()
		: pageCategoryProduct();
})();
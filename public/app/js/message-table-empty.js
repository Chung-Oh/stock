import {rowsTable} from './helpers/table-order.js';
// Mensagem quando nome da Pesquisa não existe
export function messageTableEmpty() {
	const invisible = document.querySelectorAll(".info-row.invisible");
	const msg = document.querySelector(".msg-table-search");
	if (rowsTable.length == invisible.length) {
		msg.classList.remove("invisible");
	} else {
		msg.classList.add("invisible");
	}
}
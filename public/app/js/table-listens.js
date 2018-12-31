import {orderById, orderByName} from './helpers/table-order.js';
// Cabeçalho Tabela onde ordena colunas
const tbHead = document.querySelectorAll(".order");
// Coluna ID cabeçalho
const idListens = tbHead[0];
// Coluna Nome cabeçalho
const nameListens = tbHead[1];
// Linhas Tabela

if (idListens) {
	idListens.addEventListener("click", () => {
		orderById();
	});
}

if (nameListens) {
	nameListens.addEventListener("click", () => {
		orderByName();
	});	
}
import {orderBy} from './helpers/table-order.js';
// Linhas Tabela
export const rowsTable = document.querySelectorAll(".info-row");
// Cabeçalho Tabela onde ordena colunas
const tbHead = document.querySelectorAll(".order");
// Coluna cabeçalho abaixo
const idListens = tbHead[0];
const nameListens = tbHead[1];
const weightListens = tbHead[2];
const colorListens = tbHead[3];
const categoryListens = tbHead[4];

idListens 
	? idListens.addEventListener("click", () => 
		orderBy(tbHead, rowsTable, 0))
	: null;

nameListens 
	? nameListens.addEventListener("click", () => 
		orderBy(tbHead, rowsTable, 1))	
	: null;

weightListens 
	? weightListens.addEventListener("click", () => 
		orderBy(tbHead, rowsTable, 3))
	: null;

colorListens
	? colorListens.addEventListener("click", () => 
		orderBy(tbHead, rowsTable, 4))
	: null;

categoryListens
	? categoryListens.addEventListener("click", () => 
		orderBy(tbHead, rowsTable, 5))
	: null;
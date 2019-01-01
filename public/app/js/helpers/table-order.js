// Linhas Tabela
export const rowsTable = document.querySelectorAll(".info-row");
// Coleção de Linhas Tabela
let list = [];
// Variável onde recebe Clone do rowsTable
let copy;
// Contador para Manipulação das Tabelas
let count;
// Verifica se já foi ordenado 
let toogle = false;

export function orderById() {
	if (!toogle) {
		runList();
		list.sort((a, b) => {
			let temp1 = parseInt(a.children[0].textContent, 10);
			let temp2 = parseInt(b.children[0].textContent, 10);
			return temp2 - temp1; 
		});		
	} else {
		listReverse();
	}
	tbManipulate();
}

export function orderByName() {
	if (!toogle) {
		runList();
		list.sort((a, b) => {
			return a.children[1].textContent > b.children[1].textContent ? 1 : 
			((b.children[1].textContent > a.children[1].textContent) ? -1 : 0);
		});		
	} else {
		listReverse();
	}
	tbManipulate();
}

function runList() {
	list = [];
	toogle = true;
	rowsTable.forEach(row => {
		copy = row.cloneNode(true);
		list.push(copy);
	});	
}

function listReverse() {
	toogle = false;
	list.reverse();
}

function tbManipulate() {
	count = 0;
	rowsTable.forEach(row => {
		row.children[0].innerHTML = list[count].children[0].outerHTML;
		row.children[1].innerHTML = list[count].children[1].outerHTML;
		row.children[2].innerHTML = list[count].children[2].outerHTML;
		row.children[3].innerHTML = list[count].children[3].outerHTML;
		count++;
	});
}
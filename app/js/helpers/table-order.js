// Coleção de Linhas Tabela
let list = [];
// Variável onde recebe Clone do rowsTable
let copy;
// Contador para Manipulação das Tabelas
let count;
// Verifica se já foi ordenado 
let toogle = false;

export const orderBy = (tbHead, rowsTable, column) => 
	processOrderBy(tbHead, rowsTable, column);

const processOrderBy = (tbHead, rowsTable, column) => {
	if (!toogle) {
		runList(rowsTable);
		list.sort((a, b) => {
			if (column == 0 || column == 3) {
				let temp1 = parseInt(a.children[column].textContent, 10);
				let temp2 = parseInt(b.children[column].textContent, 10);
				return temp2 - temp1; 
			} else {
				return a.children[column].textContent > b.children[column].textContent 
					? 1 
					: ((b.children[column].textContent > a.children[column].textContent) ? -1 : 0);
			}
		});		
	} else {
		listReverse();
	}
	verifyTable(tbHead, rowsTable);
}

const runList = rowsTable => {
	list = [];
	toogle = true;
	rowsTable.forEach(row => {
		copy = row.cloneNode(true);
		list.push(copy);
	});	
}

const listReverse = () => {
	toogle = false;
	list.reverse();
}

const verifyTable = (tbHead, rowsTable) => 
	tbHead.length == 2 ? tableCategory(rowsTable) : tableProduct(rowsTable);

const tableCategory = rowsTable => {
	count = 0;
	rowsTable.forEach(row => {
		row.children[0].innerHTML = list[count].children[0].outerHTML;
		row.children[1].innerHTML = list[count].children[1].outerHTML;
		row.children[2].innerHTML = list[count].children[2].outerHTML;
		row.children[3].innerHTML = list[count].children[3].outerHTML;
		count++;
	});
}

const tableProduct = rowsTable => {
	count = 0;
	rowsTable.forEach(row => {
		row.children[0].innerHTML = list[count].children[0].outerHTML;
		row.children[1].innerHTML = list[count].children[1].outerHTML;
		row.children[2].innerHTML = list[count].children[2].outerHTML;
		row.children[3].innerHTML = list[count].children[3].outerHTML;
		row.children[4].innerHTML = list[count].children[4].outerHTML;
		row.children[5].innerHTML = list[count].children[5].outerHTML;
		row.children[6].innerHTML = list[count].children[6].outerHTML;
		row.children[7].innerHTML = list[count].children[7].outerHTML;
		count++;
	});
}
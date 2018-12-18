// Cabeçalho Tabela onde ordena colunas
let tbHead = document.querySelectorAll(".order");
// Coluna ID cabeçalho
let idOrder = tbHead[0];
// Coluna Nome cabeçalho
let nameOrder = tbHead[1];
// Linhas Tabela
let infoRow = document.querySelectorAll(".info-row");
// Coleção de Linhas Tabela
let listCategory = [];
// Variável onde recebe Clone do infoRow
let copy;
// Contador para Manipulação das Tabelas
let count;
// Verifica se já foi ordenado 
let toogle = false;

idOrder.addEventListener("click", () => {
	runListCategory();
	if (!toogle) {
		toogle = true;
		listCategory.sort((a, b) => {
			temp1 = parseInt(a.children[0].textContent, 10);
			temp2 = parseInt(b.children[0].textContent, 10);
			return temp2 - temp1; 
		});		
	} else {
		toogle = false;
		listCategory.reverse();
	}
	tbManipulateCategory();
});

nameOrder.addEventListener("click", () => {
	runListCategory();
	if (!toogle) {
		toogle = true;
		listCategory.sort((a, b) => {
			return a.children[1].textContent > b.children[1].textContent ? 1 : 
				((b.children[1].textContent > a.children[1].textContent) ? -1 : 0);
		});		
	} else {
		toogle = false;
		listCategory.reverse();
	}
	tbManipulateCategory();
});

function runListCategory() {
	listCategory = [];
	infoRow.forEach(row => {
		copy = row.cloneNode(true);
		listCategory.push(copy);
	});	
}

function tbManipulateCategory() {
	count = 0;
	infoRow.forEach(row => {
		row.children[0].innerHTML = listCategory[count].children[0].textContent;
		row.children[1].innerHTML = listCategory[count].children[1].outerHTML;
		row.children[2].innerHTML = listCategory[count].children[2].outerHTML;
		row.children[3].innerHTML = listCategory[count].children[3].outerHTML;
		count++;
	});
}
/* Barra navegação Mobile */
function topNavAnimation() {
	let navBar = document.getElementById("topNavResponsive");
	let main = document.querySelector("main");
	// Ícone caixa Pesquisa
	let iconSearch = document.querySelector(".icon-search");
	
	if (navBar.className === "top-nav") {
		navBar.className += " responsive";
		main.className = "main-down";
		// Ajuste ícone
		iconSearch.style.display = "none";
		fadeIn(iconSearch, 2);
		iconSearch.style.top = "264px";
	} else {
		navBar.className = "top-nav";
		main.className = "";
		// Ajuste ícone
		fadeIn(iconSearch, 2);
		iconSearch.style.top = "132px";
	}
}

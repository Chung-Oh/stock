/* Barra nagegação Mobile */
function topNavAnimation() {
	let navBar = document.getElementById("topNavResponsive");
	let main = document.querySelector("main");
	
	if (navBar.className === "top-nav") {
		navBar.className += " responsive";
		main.className = "main-down";
	} else {
		navBar.className = "top-nav";
		main.className = "";
	}
}

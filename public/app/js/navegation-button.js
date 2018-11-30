function topNavAnimation() {
	var navBar = document.getElementById("topNavResponsive");
	var main = document.querySelector("main");
	
	if (navBar.className === "top-nav") {
		navBar.className += " responsive";
		main.className = "down";
	} else {
		navBar.className = "top-nav";
		main.className = "";
	}
}
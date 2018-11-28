function topNavAnimation() {
	var navBar = document.getElementById("topNavResponsive");
	if (navBar.className === "top-nav") {
		navBar.className += " responsive";
	} else {
		navBar.className = "top-nav";
	}
}
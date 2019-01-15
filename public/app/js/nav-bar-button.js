import {fadeIn, fadeOut} from './helpers/fade-elements.js';
import {msgDanger, msgSuccess, screenHeight} from './msg-session.js';
// Barra navegação Mobile
const btn = document.querySelector(".icon");
const navBar = document.getElementById("topNavResponsive");
const main = document.querySelector("main");
// Ícone no input dentro do Main
const iconSearch = document.querySelector(".icon-search");

const topNavAnimation = () => {	
	if (navBar.className === "top-nav") {
		navBar.className += " responsive";
		main.className = "main-down";
		iconTop();
	} else {
		navBar.className = "top-nav";
		main.className = "";
		iconDown();
	}
}

const iconTop = () => {
	if (iconSearch) {
		if (screenHeight != 657) {
			fadeIn(iconSearch, 2);
			iconSearch.style.top = "264px";						
		}
	}
}

const iconDown = () => {
	if (iconSearch) {
		if (screenHeight != 657) {
			fadeIn(iconSearch, 4);
			iconSearch.style.top = "132px";						
		}
	}
}

btn.addEventListener("click", () => topNavAnimation());
import {fadeIn, fadeOut} from './services/fade-elements.js';
/* Barra navegação Mobile */
const btn = document.querySelector(".icon");
const navBar = document.getElementById("topNavResponsive");
const main = document.querySelector("main");
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
		fadeIn(iconSearch, 2);
		iconSearch.style.top = "264px";			
	}
}

const iconDown = () => {
	if (iconSearch) {
		fadeIn(iconSearch, 4);
		iconSearch.style.top = "132px";			
	}
}

btn.addEventListener("click", () => topNavAnimation());
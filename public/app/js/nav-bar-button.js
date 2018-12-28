import {fadeIn, fadeOut} from './helpers/manipulate-form.js';
/* Barra navegação Mobile */
const btn = document.querySelector(".icon");
const navBar = document.getElementById("topNavResponsive");
const main = document.querySelector("main");
const iconSearch = document.querySelector(".icon-search");

btn.addEventListener("click", () => topNavAnimation());

function topNavAnimation() {	
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

function iconTop() {
	if (iconSearch) {
		fadeIn(iconSearch, 2);
		iconSearch.style.top = "264px";			
	}
}

function iconDown() {
	if (iconSearch) {
		fadeIn(iconSearch, 4);
		iconSearch.style.top = "132px";			
	}
}
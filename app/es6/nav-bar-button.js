import { fadeIn, fadeOut } from './helpers/fade-elements.js';
// Barra navegação Mobile
const btn = document.querySelector(".icon");
const navBar = document.getElementById("topNavResponsive");
const main = document.querySelector("main");
// Ícone no input dentro do Main
const iconSearch = document.querySelector(".icon-search");

const topNavAnimation = () => {	
	navBar.className === "top-nav"
		? (navBar.className += " responsive", main.className = "main-down")
		: (navBar.className = "top-nav", main.className = "");
}

btn.addEventListener("click", () => topNavAnimation());
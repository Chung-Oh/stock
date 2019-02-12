import { fadeIn } from './helpers/fade-elements.js';

const formRedefine = document.getElementById("formRedefine");
const btnCancelRedefine = document.getElementById("btnCancelRedefine");
const dir = window.location.pathname;

btnCancelRedefine
	? btnCancelRedefine.addEventListener("click", () => 
		window.location.href = "user.php")
	: null;

dir == "/app/view/redefine.php"
	? fadeIn(formRedefine)
	: null;
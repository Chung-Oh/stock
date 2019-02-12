import { details } from './form-edit.js';

const btnOpen = document.querySelector(".open-close");
let toogle = false;

const runDetails = toogle => {
	for (let i = 0; i < details.children[0].children.length; i++) {
		details.children[0].children[i].open = toogle;
	}
}

btnOpen
	? btnOpen.addEventListener("click", () => 
		!toogle ? runDetails(toogle = true)	: runDetails(toogle = false))
	: null;
import {details} from './form-edit.js';

const btnOpen = document.querySelector(".open");
let toogle = false;

if (btnOpen) {
	btnOpen.addEventListener("click", () => {
		if (!toogle) {
			toogle = true;
			for (let i = 0; i < details.children[0].children.length; i++) {
				// Atribuindo true no elemento DETAILS
				details.children[0].children[i].open = true;
			}		
		} else {
			toogle = false;
			for (let i = 0; i < details.children[0].children.length; i++) {
				details.children[0].children[i].open = false;
			}	
		}
	});	
}
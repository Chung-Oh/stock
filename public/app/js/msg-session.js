import {fadeIn, fadeOut} from './helpers/manipulate-form.js';

function alertSession() {
	// Mensagens das sessions
	let msgDanger = document.querySelector(".alert-danger");
	let msgSuccess = document.querySelector(".alert-success");

	if (msgDanger) {
		fadeOut(msgDanger, 15);
	}

	if (msgSuccess) {
		fadeOut(msgSuccess, 15);	
	}	
}

alertSession();
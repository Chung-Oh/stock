import {fadeIn, fadeOut} from './helpers/fade-elements.js';

const  alertSession = () => {
	// Mensagens das sessions
	const msgDanger = document.querySelector(".alert-danger");
	const msgSuccess = document.querySelector(".alert-success");
	msgDanger ? fadeOut(msgDanger, 15) : null;
	msgSuccess ? fadeOut(msgSuccess, 15) : null;
}

alertSession();
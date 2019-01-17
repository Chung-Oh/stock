import {fadeIn, fadeOut} from './helpers/fade-elements.js';
// Alerta das Sessions
export const msgDanger = document.querySelector(".alert-danger");
export const msgSuccess = document.querySelector(".alert-success");

const  alertSession = () => {
	msgDanger ? fadeOut(msgDanger, 15) : null;
	msgSuccess ? fadeOut(msgSuccess, 15) : null;
}

alertSession();
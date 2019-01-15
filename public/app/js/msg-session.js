import {fadeIn, fadeOut} from './helpers/fade-elements.js';
// Alerta das Sessions
export const msgDanger = document.querySelector(".alert-danger");
export const msgSuccess = document.querySelector(".alert-success");
// Tamanho da tela
export const screenHeight = window.innerHeight;
const icon = document.querySelector(".icon-search");

const  alertSession = () => {
	msgDanger ? fadeOut(msgDanger, 15) : null;
	msgSuccess ? fadeOut(msgSuccess, 15) : null;
}

const iconMain = () => {
	if (msgDanger || msgSuccess) {
		icon.style.top = "175px";			
		setTimeout(function() {
			if (screenHeight != 657) {
				fadeIn(icon, 1);
				icon.style.top = "132px";				
			}
		}, 8300);
	}	
}
// Corrigi msg erro Home, não tem caixa pesquisa
icon != null ? iconMain() : null;

alertSession();
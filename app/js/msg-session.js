// Alerta das Sessions
const msgDanger = document.querySelector(".alert-danger");
const msgSuccess = document.querySelector(".alert-success");

const  alertSession = () => {
	msgDanger ? fadeOut(msgDanger, 15) : null;
	msgSuccess ? fadeOut(msgSuccess, 15) : null;
}

alertSession();
// Mensagem quando nome da Pesquisa não existe
export const messageTableEmpty = context => {
	const invisible = document.querySelectorAll(".info-row.invisible");
	const msg = document.querySelector(".msg-table-search");
	context.length == invisible.length
		? msg.classList.remove("invisible")
		: msg.classList.add("invisible");
}
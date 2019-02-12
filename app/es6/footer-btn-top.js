const btnTop = document.querySelector(".btn-top");
const footer = document.querySelector("footer");

window.onscroll = () => {
	document.documentElement.scrollTop > 1 || document.body.scrollTop > 1
		? (btnTop.style.display = "block", footer.style.display = "block")
		: (btnTop.style.display = "none", footer.style.display = "none");
}

btnTop.addEventListener("click", event => {
	event.preventDefault;
	window.scrollTo({
		top: 0,
		behavior: "smooth"
	});
});
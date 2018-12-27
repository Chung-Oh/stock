(function showSearchBox() {
	let navBar = document.querySelectorAll(".page-action");
	if (window.location.href == "http://localhost:8000/src/View/home.php") {
		navBar[2].style.display="none";
	} 
})();

(function search() {
	let inputs = document.querySelectorAll(".search");
	let rows = document.querySelectorAll(".info-row");
	inputs.forEach(search => {
		search.addEventListener("input", function() {
			if (this.value.length > 0) {
				for (let i = 0; i < rows.length; i++) {
					let row = rows[i];
					let tdName = row.querySelector(".info-name");
					let name = tdName.textContent.trim();
					let expression = new RegExp(this.value, "i");		
					if (!expression.test(name)) {
						row.classList.add("invisible");
					} else {
						row.classList.remove("invisible");
					}
				}	
			} else {
				for (let i = 0; i < rows.length; i++) {
					let row = rows[i];
					row.classList.remove("invisible");
				}
			}
		});	
	});
})();

function cleanSearch() {
	let inputs = document.querySelectorAll(".search");
	let rows = document.querySelectorAll(".info-row");
	inputs.forEach(search => {
		search.value = "";
		for (let i = 0; i < rows.length; i++) {
			let row = rows[i];
			row.classList.remove("invisible");
		}
	});
}

(function messageTableEmpty() {
	let inputs = document.querySelectorAll(".search");
	let rows = document.querySelector(".info-row .invisible");
	inputs.forEach(search => {
		console.log();		
	})
})();
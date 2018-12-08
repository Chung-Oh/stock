// btnFormCreate e formCreate do arquivo form-category-edit
let data = document.querySelector(".category");

function showForm() {
	fadeOut(btnFormCreate, 1);
	setTimeout(function() {
		fadeIn(formCreate, 1);
	}, 700);
}

function hiddenForm() {
	data.value = '';
	fadeOut(formCreate, 1);
	setTimeout(function() {
		fadeIn(btnFormCreate, 1);
	}, 700);
}

function fadeIn(element, time) {
	process(element, time, 0, 100);
}

function fadeOut(element, time) {
	process(element, time, 100, 0);
}

function process(element, time, initial, end) {
	if (initial == 0) {
		increment = 2;
		testClassName(element);		
	} else {
		increment = -2;
	}

	let opc = initial;
	// A mágica acontece aqui, efeito de opacidade e o display none no fim
	let interval = setInterval(function() {
		if (opc == end) {
			if (end == 0) {
				element.style.display = "none";
			}
			clearInterval(interval);
		} else {
			opc += increment;
			element.style.opacity = opc/100;
			element.style.filter = "alpha(opacity=" + opc + ")";
		}
	}, time * 10);
}

function testClassName(element) {
	element.className == "row btn" 
		? element.style.display = "flex" 
		: element.style.display = "block";	
}

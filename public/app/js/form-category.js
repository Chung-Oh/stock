let btnCreate = document.getElementById('callForm');
let form = document.getElementById('categoryForm');
let data = document.querySelector('.category');

function showForm() {
	fadeOut(btnCreate, 1);
	setTimeout(function() {
		fadeIn(form, 1);
	}, 700);
}

function hiddenForm() {
	data.value = '';
	fadeOut(form, 1);
	setTimeout(function() {
		fadeIn(btnCreate, 1);
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

	opc = initial;
	// A mágica acontece aqui, efeito de opacidade e o display none no fim
	interval = setInterval(function() {
		if (opc == end) {
			if (end == 0) {
				element.style.display = "none";
			}
			clearInterval(interval);
		} else {
			opc += increment;
			element.style.opacity = opc/100;
			element.style.filter = "alpha(opacity="+opc+")";
		}
	}, time * 10);
}

function testClassName(element) {
	element.className == "row btn" 
		? element.style.display = "flex" 
		: element.style.display = "block";	
}

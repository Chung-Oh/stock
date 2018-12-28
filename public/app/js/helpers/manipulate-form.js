export function fadeIn(element, time) {
	process(element, time, 0, 100);
}

export function fadeOut(element, time) {
	process(element, time, 100, 0);
}

function process(element, time, initial, end) {
	let increment = 0;
	if (initial == 0) {
		increment = 2;
		testClassName(element);		
	} else {
		increment = -2;
	}

	let opc = initial;
	// A mágica acontece aqui, efeito de opacidade e o display NONE no fim
	let interval = setInterval(() => {
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
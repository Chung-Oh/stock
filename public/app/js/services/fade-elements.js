export const fadeIn = (element, time) => process(element, time, 0, 100);

export const fadeOut = (element, time) => process(element, time, 100, 0);

const process = (element, time, initial, end) => {
	let opc = initial;
	let increment = 0;
	if (initial == 0) {
		increment = 2;
		testClassName(element);		
	} else {
		increment = -2;
	}
	// A mágica acontece aqui, efeito de opacidade e o display NONE no fim
	const interval = setInterval(() => {
		if (opc == end) {
			end == 0 ? element.style.display = "none" : null;
			clearInterval(interval);
		} else {
			opc += increment;
			element.style.opacity = opc/100;
			element.style.filter = "alpha(opacity=" + opc + ")";
		}
	}, time * 10);
}

const testClassName = element => {
	element.className == "row btn" 
		? element.style.display = "flex" 
		: element.style.display = "block";	
}
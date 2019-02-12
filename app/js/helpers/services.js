const cleanInputs = arg => arg.forEach(i => i.value = "");

const process = (arg1, arg2, arg3) => {
	cleanInputs(arg3);
	testSelect();
	fadeOut(arg1, 1);
	setTimeout(() => fadeIn(arg2, 1), 700);
}
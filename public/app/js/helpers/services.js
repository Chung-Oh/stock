import {fadeIn, fadeOut} from './fade-elements.js';
import {testSelect} from './select.js';

export const cleanInputs = arg => arg.forEach(i => i.value = "");

export const process = (arg1, arg2, arg3) => {
	cleanInputs(arg3);
	testSelect();
	fadeOut(arg1, 1);
	setTimeout(() => fadeIn(arg2, 1), 700);
}
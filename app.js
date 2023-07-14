let btnLogin = document.querySelector(".div-btn-login-js");
let btnSignup = document.querySelector(".div-btn-signup-js");
let formLogin = document.querySelector(".formLogin");
let formSignup = document.querySelector(".formSignup");

btnLogin.onclick=function () {
	formLogin.style="display:block";
	btnLogin.style="background-color:black;color:white;padding:10px;border-radius:4px";
	btnSignup.style="background-color:transparent;color:black;padding:10px;border-radius:4px";
	formSignup.style="display:none";
}

btnSignup.onclick=function () {
	formSignup.style="display:block";
	btnSignup.style="background-color:black;color:white;padding:10px;border-radius:4px";
	btnLogin.style="background-color:transparent;color:black;padding:10px;border-radius:4px";
	formLogin.style="display:none";
}
/**
* @Author: Dregend Drewonidas <root>
* @Date:   Monday, October 10, 2016 9:28 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Monday, October 24, 2016 1:58 AM
* @License: maDezynIzM.E. 2016
*/

var signIn = null;
var signUp = null;
//join.addEventListener("click", )
function linkEvents() {
	document.getElementById("join").addEventListener("click", toggleLoginForm, false);
	//document.getElementById("upload").addEventListener("click", toggleUploadForm, false);
	document.getElementById("openSignIn").addEventListener("click", openSignIn, false);
	document.getElementById("openSignUp").addEventListener("click", openSignUp, false);
	signIn = document.getElementById("signInForm");
	signUp = document.getElementById("signUpForm");
    signIn.style.display = "flex";
    signUp.style.display = "none";
	//document.getElementById("studio_btn").addEventListener("click", openPhotostudio, false);
}

function toggleLoginForm(event)
{
	var form = document.getElementById("access_form");
	if (form.style.width == "450px")
		form.style.width = "0";
	else
		form.style.width = "450px";
}

function openSignUp(event) {
	if (signUp.style.display == "none") {
        signUp.style.display = "flex";
        signIn.style.display = "none";
    } else
		signUp.style.display = "none";
}

function openSignIn(event) {
	if (signIn.style.display == "none") {
        signIn.style.display = "flex";
        signUp.style.display = "none";
    } else
		signIn.style.display = "flex";
}

function toggleUploadForm(event) {
	var uploadForm = document.getElementById("upload_form");
	if (uploadForm.style.display == "flex")
		uploadForm.style.display = "none";
	else
		uploadForm.style.display = "flex";
}

function openPhotostudio(studio) {
	var studio = document.getElementById("photostudio");
	studio.style.display = "flex";
}

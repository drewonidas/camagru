/**
 * Created by Andrew on 2017/03/31.
 */

var username = null;
var password1 = null;

function validateUser() {
    username = document.forms["signInForm"]["signInUsername"].value;
    password1 = document.forms["signInForm"]["signInPassword"].value;
    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open("POST", "model/webServer.php", true);
    var params = {"uname" : username, "upwd" : password1, "REQ_TYPE" : "SIGNIN"};
    xhttpRequest.setRequestHeader("Content-Type", "application/json");
    xhttpRequest.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(xhttpRequest.responseText);
            alert("You have signed in");
        }
    };
    xhttpRequest.send(JSON.stringify(params));
}

function registerUser() {
    var email = document.forms["signUpForm"]["signUpEmail"].value;
    var password2 = document.forms["signUpForm"]["signUpPassword2"].value;
    username = document.forms["signUpForm"]["signUpUsername"].value;
    password1 = document.forms["signUpForm"]["signUpPassword1"].value;
    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open("POST", "model/webServer.php", true);
    var params = {"uname" : username, "upwd" : password1, "email" : email, "REQ_TYPE" : "SIGNUP"};
    xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(xhttpRequest.responseText);
            alert("You have signed up!! Welcome");
        }
    };
    xhttpRequest.send(JSON.stringify(params));
    // location.pathname = "camagru/";
}

function isSignedIn() {
    var dbParam = JSON.stringify("who");
    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open("GET", "model/webServer.php?x=" + dbParam, true);
    xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("username").innerHTML = JSON.parse(xhttpRequest.responseText);
        }
    };
    xhttpRequest.send();
    // location.pathname = "camagru/";
}

function signOut() {
    var dbParam = JSON.stringify("SIGNOUT");
    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open("GET", "model/webServer.php?x=" + dbParam, true);
    xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            alert("You have signed out");
        }
    };
    xhttpRequest.send();
}

/**
 * Created by Andrew on 2017/03/31.
 */

var username = null;
var password1 = null;
var password2 = null;

function validateUser() {
    username = document.forms["signInForm"]["signInUsername"].value;
    password1 = document.forms["signInForm"]["signInPassword"].value;

    var xhttpRequest = new XMLHttpRequest();
    xhttpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(xhttpRequest.responseText);
            console.log(response);
        }
    }
    xhttpRequest.open("POST", "model/webServer.php", true);
    var params = "uname=" + username + "&upwd=" + password1;
    xhttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttpRequest.send(params);
}
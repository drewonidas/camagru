/**
 * Created by Andrew on 2017/03/31.
 */

var username = null;
var password1 = null;
var video = null;
var webcamStream = null;

function sendRequest(requestMethod, postParams, getParams) {
    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open(requestMethod, "model/webServer.php" + getParams, true);
    xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            console.log(xhttpRequest.response);
            var response = JSON.parse(xhttpRequest.responseText);
            return response;
        }
    };
    if (getParams !== "")
        xhttpRequest.send();
    else
        xhttpRequest.send(JSON.stringify(postParams));
}

function validateUser() {
    username = document.forms["signInForm"]["signInUsername"].value;
    password1 = document.forms["signInForm"]["signInPassword"].value;

    var params = {"uname" : username, "upwd" : password1, "REQ_TYPE" : "SIGNIN"};
    console.log(sendRequest("POST", params, ""));
}

function registerUser() {
    var email = document.forms["signUpForm"]["signUpEmail"].value;
    var password2 = document.forms["signUpForm"]["signUpPassword2"].value;
    username = document.forms["signUpForm"]["signUpUsername"].value;
    password1 = document.forms["signUpForm"]["signUpPassword1"].value;

    var params = {"uname" : username, "upwd" : password1, "email" : email, "REQ_TYPE" : "SIGNUP"};
    console.log(sendRequest("POST", params, ""));
}

function isSignedIn() {
    var data = JSON.stringify("who");
    var params = "?x=" + data;
    console.log(sendRequest("GET", null, params));
}

function signOut() {
    var data = JSON.stringify("SIGNOUT");
    var params = "?x=" + data;
    console.log(sendRequest("GET", null, params));
}

function webcamDisplay() {
    video = document.getElementById("webCamVideo");

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    if (navigator.getUserMedia) {
        navigator.getUserMedia({video: true}, handleVideo, videoError);
    }

    function handleVideo(stream) {
        video.src = window.URL.createObjectURL(stream);
        //webcamStream = localMediaStream;
    }

    function videoError(e) {
        // do something
    }
}

function stopWebcam() {
    //webcamStream.stop();
}

function photoshot() {
    var canvas, ctx;
    // Get the canvas and obtain a context for drawing in it
    canvas = document.getElementById("cam_snap_canvas");
    // Draw current image from the video element into the canvas
    ctx = canvas.getContext('2d');
    canvas.width = 800;
    canvas.height = 600;
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
    var imposer = document.getElementById("imposer");
    // ctx.drawImage(imposer, 0, 0, 400, 400);

    // base64 encode image to send as json string
    var snapData = canvas.toDataURL("img/png");
    snapData = snapData.replace("data:image/png;base64,", "");
    var params = {"REQ_TYPE": "IMG_BLEND", "camSnapData": snapData};
    console.log(sendRequest("POST", params, ""));
}

/*function registerUser() {
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
}*/

function selectImposer(event) {
    imposer.src = event.src;
    imposer.style.zIndex = "4";
    console.log(event);
}

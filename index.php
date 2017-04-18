<!--
@Author: Dregend Drewonidas <root>
@Date:   Monday, October 17, 2016 3:44 PM
@Email:  dlaminiandrew@gmail.com
@Last modified by:   root
@Last modified time: Tuesday, October 25, 2016 2:26 AM
@License: maDezynIzM.E. 2016
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="styles/style.css" rel="stylesheet"/>
	<link href="styles/style_main.css" rel="stylesheet"/>
	<script src="contollers/viewsController.js"></script>
	<script src="contollers/appController.js"></script>
	<title>CamaGru</title>
</head>
<body onload="linkEvents()">
<header class="md_container md_float_base" id="nav">
    <nav class="md_container">
        <div id="logo">CamaGru</div>
        <a id="gallery_btn">Gallery</a>
        <a id="studio_btn">Photostudio</a>
    </nav>
    <div class="md_dropdown md_container" >
        <div id="join" class="">
            <img src="resources/appImages/user.svg" id="avatar"/>
            <p id="username"></p>
        </div>
        <a onclick="signOut()" id="sign_out_button">Sign Out</a>
    </div>
</header>
<!--
    main window
-->
<?php include_once("views/signInViewModal.html")?>
    <section class="md_container md_full_size content" id="main">
        <?php include_once("views/cameraView.html")?>
	</section>
	<footer class="md_container">
        <div>
            <p>The CamaGru Project</p>
            <p>maDezynIzM_E_ 2017</p>
        </div>
	</footer>
</body>
</html>

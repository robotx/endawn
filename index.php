<?php
require('Traitement/bdd/Connect.php')
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Style/normalize.css" />
    <link rel="stylesheet" href="Style/style.css" />
</head>
<body>
<div class="sidebar card animate-left" style="display:none" id="mySidebar">
   <div class="button1" id="adminproj"><a href="#" ><h4 id="title1">Administration du site</h4></a></div>
   <img id="closeNav" onclick="w3_close()" width="50" height="50" src="Style/leftarrow.svg" />
</div>

<div id="main">

    <div id="topbar">
        <div class="w3-container">
            <h1 style="color:white;text-align:center">Endawn</h1>
        </div>
        <img id="openNav" onclick="w3_open()" width="50" height="50" src="Style/rightarrow.svg" />

    </div>

</body>
<script>
    function w3_open() {
        document.getElementById("main").style.marginLeft = "15%";
        document.getElementById("mySidebar").style.width = "15%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
</script>
</html>


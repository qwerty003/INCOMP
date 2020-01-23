<html>
<head>
<title> Home </title>
<link rel="stylesheet" type="text/css" href="main1.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<! HEADER !>
<div class = "header">
</div>

<?php
?>
<! NAVIGATION BAR !>
<div class = "navigbar">
  <form name = "main"  action = "main.php" method = "POST">
  <div class = "navig"><button class = "navigbtn" type = "button" name = "btn_home" onclick = "window.location.href = 'main.php';"> Home </button></div>
  <div class = "navig"><button class = "navigbtn" type = "button" name = "btn_feed" onclick = "window.location.href = 'feed.html';"> Feed </button></div>
  <div class = "navig"><button class = "navigbtn" type = "button" name = "btn_mail" onclick = "window.location.href = 'mail.php';"> Mail </button></div>
  <div class = "navig"><button class = "navigbtn" type = "button" name = "btn_events" onclick = "window.location.href = 'events.html';"> Groups </button></div>
  <div class = "navigsearch"><input type = "text" name = "t01"  class = "search" placeholder= "Search" />  <input type = "submit" name = "search" value = "Search" id = "s1"/></div>
  <div class = "navig"><a href = "index.php"> <i class="material-icons" style="color:white;margin-top:12px;">logout</i> </a></div>
</form>
</div>

<br> <br> <br>

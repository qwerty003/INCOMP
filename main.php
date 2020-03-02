<?php
if(!isset($_SESSION["user"]))	
{
 session_start() or die;
}
?>
<?php
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database"));
$user =$_SESSION["user"];
if(isset($_POST['search']))
{
	$flname = "";
	$flname=$_POST["t01"];
	include('search.php');
}
else
{
?>
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

<div class = "content">
<div class = "left">

  <!LEFT PANE - 1 !>
  <div class = "leftcontent"><ul>
    <li><div class = "leftdiv head">NOTIFS</div></li><br>
    <?php
     $notifs = array("Notif-1","Notif-1","Notif-1","Notif-1","Notif-1");
     foreach($notifs as $notif)
     {
       echo '<li>';
  	   echo '<div class = "leftdiv">'.$notif.'</div>';
  	   echo '</li>';
  	   echo '<br>';
     }
    ?>
  </div>
  
  <br> <br> <br>
  
  <!LEFT PANE - 2 !>
  <div class = "leftcontent"><ul>
    <li><div class = "leftdiv head">APPOINTMENTS</div></li><br>
    <?php
     $events = array("Event1","Event2","Event3","Event4","Event5");
     foreach($events as $event)
     {
       echo '<li>';
  	   echo '<div class = "leftdiv">'.$event.'</div>';
  	   echo '</li>';
  	   echo '<br>';
     }
    ?>
  </div>

</div>

<! Center screen !>

<div class = "center">
  <div class = "card">
  <div class = "dp"></div>
  <i class="material-icons edit" style = "color:rgb(200,0,50);margin-left:470px;;">cloud</i>
  <i class="material-icons edit">mail</i>
  <i class="material-icons edit"> add</i>
  <?php
    $squery0 ="select * from login where uname = '".$user."'";
	$result0 = mysql_query($squery0)or die(mysql_error());
	$row0=mysql_fetch_array($result0);
	$fname = $row0['fname'];
	$lname = $row0['lname'];
	echo '<h1>'.$fname.' '.$lname.'</h1>';
	echo '<h3>'.$row0['uname'].' |  Male</h1>';
  ?>
  
  <br>
  <a href ="form3.php"> Edit profile </a>
  <br>
  <hr><br>
  <h2>Professional Details</h2>
   <?php
    $squery0 ="select * from professional where uname = '".$user."'";
	$result0 = mysql_query($squery0)or die(mysql_error());
	$row0=mysql_fetch_array($result0);
	echo '<p> Department : '.$row0['dept'].'</p>';
	echo '<p> Designation : '.$row0['desn'].'</p>';
	echo '<p> Tenure  :  '.$row0['tenure'].'</p>';
	echo '<p> Joined  :  '.$row0['doj'].'</p>';
  ?>
  
	
  
  </div>
</div>

<!RIGHT PANE!>

<div class = "right">
  <div class = "rightcontent">
    <h2> Suggested Contacts </h2>
	<hr>
	<?php
	// Extracting session user's org-ID from database
	$squery0 ="select orgid from professional where uname = '".$user."'";
	$result0 = mysql_query($squery0)or die(mysql_error());
	$row0=mysql_fetch_array($result0);
	$orgid = $row0['orgid'];
	$lowlim = 0;
	$uplim = 3;
	
	//Searching all records with the same Org-ID
    $squery1="select login.fname,login.lname,login.uname,professional.dept,professional.orgid from login,professional where login.uname = professional.uname and professional.orgid ='".$orgid."' limit ".$lowlim.",".$uplim."";
    $results = mysql_query($squery1)or die(mysql_error());
    $rcount = mysql_num_rows($results);
    if($rcount>0)
    {   
        while($row1=mysql_fetch_array($results))
		{
	        echo '<div class = "sresult main">'; 
	        echo '<div class = "sdp"> </div>';
			echo '<a class = "subtext-head" href = "profile.php?userid=' .$row1['uname']. '"> '.$row1['fname']. ' '.$row1['lname']. '</a>&nbsp;';
			echo '<p class = "subtext">'.$row1['orgid'].'</p>';
			echo '<p class = "subtext">'.$row1['dept'].'</p>';
	        echo '</div>';
			echo '<br>';
	    }
	}
		
	else
	{
		echo 'No one in your organisation';
	}
	?>
  

  </div>
</div>

</div>

<br> <br> <br>

<!FOOTER!>

<div class = "footer">

</div>



<?php
/*
	 echo 'welcome'.$user ;
	 $info = mysql_query("select * from info where username = '$user'")or die(mysql_error());
	 $row = mysql_fetch_array( $info );
	 echo($row['username']);
	 echo($row['First_Name']);*/
?>


	
  
  
</form>
</body>
</html>
<?php
}
?>
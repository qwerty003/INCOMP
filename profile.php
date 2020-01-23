<?php
//Start session
session_start() or die();
?>

<?php
include('main_top.php');
include('main_left.php');
?>

<! Center screen !>

<div class = "center">
  <div class ="pcard">
  <center>
    <?php
      
	  $userid = $_GET['userid'];
	  echo("$userid");
	  mysql_connect("localhost","root","") or die(mysql_error()); 
      mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database"));
      $squery="select fname,lname,uname,email from login where uname ='".$userid."'";
      $results = mysql_query($squery)or die(mysql_error()); 
	  $row1 = mysql_fetch_array($results);
	  
      echo '<br>';
	  echo($row1['fname']);
	  //echo '<br>';
	  echo 'Block-'.$row1['lname'];
	  echo '<br>';
	  echo 'Block-'.$row1['email'];
	  echo '<br>';
	  echo 'Occupation-'.$row1['uname'];
		

	?>
  </div>
</div>


<?php
include('main_right.php');
include('main_footer.php');
?>
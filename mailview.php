<?php
//Start session
session_start() or die();
$user = $_SESSION["user"];
?>
<?php
include('main_top.php');
?>
<div class = "content">
<div class = "left">

  <!LEFT PANE - 1 !>
  <div class = "leftcontent main"><ul>
    <li><div class = "leftdiv head">C A T A L O G U E</div></li><br>
    <?php
     $tasks = array("Create","Inbox","Outbox","Draft","Saved");
     foreach($tasks as $task)
     {
       echo '<li>';
  	   echo '<div class = "leftdiv main">'.$task.'</div>';
  	   echo '</li>';
  	   echo '<br>';
     }
    ?>
  </div>
  
  <br> <br> <br>
  
</div>

<! Center screen !>

<div class = "center">
  <div class = "card">
  
  <?php echo "user is : ".$_SESSION["user"].".";
  
  
  $mailid = $_GET['mailid'];
  echo("$mailid");
  mysql_connect("localhost","root","") or die(mysql_error()); 
  mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database"));
  $squery="select sender,reciever,subject,body,date from mail where mailID ='".$mailid."'";
  $results = mysql_query($squery)or die(mysql_error()); 
  $row1 = mysql_fetch_array($results);
  
  echo '<br>';
  echo 'Sender-'.$row1['sender'];
  echo '<br>';
  echo 'Reciever-'.$row1['reciever'];
  echo '<br>';
  echo 'Subject-'.$row1['subject'];
  echo '<br>';
  echo 'Body-'.$row1['body'];
  echo '<br>';
  echo 'Date-'.$row1['date'];
  
 
  
  ?>

	
  
  </div>
</div>

<!RIGHT PANE!>

<div class = "right">
</div>


</div>

<br> <br> <br>
<?php
include('main_footer.php');
?>
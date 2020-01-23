<! Center screen !>

<div class = "center">
  <div class = "card">
  <?php
  echo "user is : ".$_SESSION["user"].".";
  if(isset($_GET['cc']))
  {
  $cc = $_GET['cc'];
  }
  else
  {
	  $cc = '';
  }
  ?>
  <br><br><br>
  <center>
  <form name = "create" action = "mail.php" method = "POST">
  <?php echo 'CC : <input type = "text" name = "mail_t1" value = "'.$cc.'" /><br><br>'; ?>
  Subject : <input type = "text" name = "mail_t2"/><br><br>
  BODY : <textarea name = "mail_t3" rows = "30" cols = "50" placeholder = " Enter Subject ">  </textarea><br><br>
  <input type = "submit" name = "mail_s1" value = "SEND"/>
  
  
	
  
  </div>
</div>
<?php
/*
if(isset($_POST['mail_s1']))
{
	$cc = $_POST['mail_t1'];
	$subject = $_POST['mail_t2'];
	$body = $_POST['mail_t3'];
	
	$sql = "INSERT INTO MAIL VALUES('".$user."','".$cc."','".$subject."','".$body."',curdate(),curtime());";
}
*/
?>
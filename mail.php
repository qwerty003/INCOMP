<?php
//Start session
if(!isset($_SESSION["user"]))	
{
    session_start() or die;
}
$user = $_SESSION["user"];
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database"));
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
     $items = array("Create","Inbox","Outbox","Draft","Saved");
     foreach($items as $item)
     {
	   echo '<form name = "mail" action = "mail.php" method = "POST">';
       echo '<li>';
  	   echo '<input class = "leftdiv main" type = "submit" name = "'.$item.'" value = "'.$item.'"/>';
  	   echo '</li>';
  	   echo '<br>';
	   echo '</form>';
     }
    ?>
  </div>
  
  <br> <br> <br>
  
</div>
  

<! Center screen !>

<?php
if(isset($_POST['Create']))
{
	include('mail/create.php');
}

elseif(isset($_POST['Inbox']))
{
	include('mail/inbox.php');
}

elseif(isset($_POST['Outbox']))
{
	include('mail/outbox.php');
}

elseif(isset($_POST['Draft']))
{
	include('mail/draft.php');
}

elseif(isset($_POST['Saved']))
{
	include('mail/saved.php');
}

else
{
    include('mail/create.php');	

if(isset($_POST['mail_s1']))
{
	$cc = $_POST['mail_t1'];
	$subject = $_POST['mail_t2'];
	$body = $_POST['mail_t3'];
	
	$sql = "INSERT INTO mail VALUES(NULL,'".$user."','".$cc."','".$subject."','".$body."',curdate(),curtime());";
	mysql_query($sql) or die(mysql_error());
}

}



?>

<!RIGHT PANE!>

<div class = "right">
</div>


</div>

<br> <br> <br>
<?php
include('main_footer.php');
?>
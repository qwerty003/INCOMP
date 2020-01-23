<?php
$_SESSION["fod"] = 501;
include('main_top.php');
include('main_left.php');
?>

<! Center screen !>

<div class = "center">
  <div class = "scard">
    <?php
    mysql_connect("localhost","root","") or die(mysql_error()); 
    mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database"));
    $squery="select fname,lname,uname from login where fname ='".$flname."'";
    $results = mysql_query($squery)or die(mysql_error());
    $rcount = mysql_num_rows($results);
    if($rcount>0)
    {   
        while($row1=mysql_fetch_array($results))
		{
			
			echo '<div class = "sresult">';
			echo '<div class = "sdp"> </div> <div class = "slink"><a class = "subtext-head" href = "mail.php?cc=' .$row1['uname']. '"> <i class="material-icons edit"> mail </i></a> </div>';
			echo '<a class = "subtext-head" href = "profile.php?userid=' .$row1['uname']. '"> '.$row1['fname']. ' '.$row1['lname']. '</a>&nbsp;';
			echo '<p class = "subtext">'.$row1['uname'].'</p>';
			//echo '<p class = "subtext">'.$row1['Occupation'].'</p>';
			echo '</div>';
			echo '</br>';
		
		}
		echo "user is : ".$_SESSION["user"].".";

		
	}
		
	else
	{
		echo 'No matches Found';
	}
	//<a href = "form.php?user=' .$user. '"> Sign - up </a> 
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


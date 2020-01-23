<! Center screen !>

<div class = "center">
  <div class = "scard">
    <?php
    $squery="select * from mail where reciever ='".$user."'";
    $mails = mysql_query($squery)or die(mysql_error());
    $rcount = mysql_num_rows($mails);
    if($rcount>0)
    {   
        while($row1=mysql_fetch_array($mails))
		{
			echo '<div class = "sresult">';
			echo '<a class = "subtext-head" href = "mailview.php?mailID=' .$row1['mailid']. '"> '.$row1['subject']. '</a>&nbsp;';
			echo '<p class = "subtext">'.$row1['sender'].'</p>';
			echo '<p class = "subtext">'.$row1['date'].'</p>';
			echo '</div>';
			echo '</br>';
		
		}
		echo "user is : ".$_SESSION["user"].".";

		
	}
		
	else
	{
		echo 'So Empty!  -_-';
	}
	
	?>
	
  
  
  
  
  

  </div>
</div>

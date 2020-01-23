<?php
if(!(isset($_COOKIE['oxyname'])))
 { 
header("Location: index.php"); 
 }
 ?>
 <?php
 readfile("tops.html");
 ?>
			<div id="main_block" class="style1" style="padding:0 0 5px 0">																																																																													
				<div id="item">
					<h4>New Agency Registration Panel</h4><br />
					<div class="big_view" style="height:340px">
<?php
if(!(isset($_POST['submit'])))
{
echo("<form name=newcust method =post action =newcust.php onSubmit=\"return newcusts();\"> Name of Agency <br /><input type=text size=30 name=cname id=anm><br /> <br />Address  <br /><textarea rows=4 cols=30 name=cadd id=adr></textarea><br /> <br />Contact (office)  <br /><input type=text size=30 name=coff id=cof><br /> <br />TIN/VAT:   <br /><input type=text size=30 name=chome id=cho><br /> <br />Contact (Personal)  <br /><input type=text size=30 name=cmob id=cmo><br /> <br /><input type=submit value=\" Register \" name=submit></form><span></span>");
}
else
{
$cname= $_POST['cname'];
$cadd= $_POST['cadd'];
$coff= $_POST['coff'];
$chome= $_POST['chome'];
$cmob= $_POST['cmob'];
// Connects to your Database 
mysql_connect("localhost","root","") or die(mysql_error("Connection FAILED.")); 
mysql_select_db("oxygen") or die(mysql_error("Unable to Connect to Database")); 
$query="INSERT INTO `oxygen`.`customer` (`cid`, `cname`, `cadd`, `coff`, `chome`, `cmob`, `status`, `regdate`, `actdate`) VALUES (NULL, '".$cname."', '".$cadd."', '".$coff."', '".$chome."', '".$cmob."', 'INACTIVE', CURDATE(), NULL)";
$query1="select * from customer";
$checkit= mysql_query($query) or die(mysql_error('Error updating database'));
if($checkit)
{
$check = mysql_query($query1)or die(mysql_error());
//Gives error if user dosen't exist
$check2 = mysql_num_rows($check);
$nm="aa";
  while($info = mysql_fetch_array( $check )) 	
 {
$check2=$info['cid'];
$nm=$info['cname'];
}
echo("<p>Registration Sucessfull!</p>");
echo("<p>Agency Id: ".$check2."</p>");
echo("<p>Name: ".$nm."</p>");
}
else
{
echo("Registration Not Sucessfull");
}
}
?>
					
					</div>
				
				</div>

				<div class="description">
					<p>
						<strong>How to do?</strong><br /> 
						Enter new Agency's name and details and click on &quot; Register &quot; button.
						<br /> At least One Contact Number is necessary.
						<br /> Keep Agency ID for future references.
						</p>
					<p>
						<!-- <a href="#" class="view">View</a><a href="#" class="buy">Buy this Product</a> -->
</p>
				</div>
			</div>
		</div>
	</div>						
<?php
readfile("bots.html");
?>			
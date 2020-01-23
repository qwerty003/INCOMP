<?php
if(!(isset($_COOKIE['oxyname'])))
 { 
header("Location: index.php");  
 }
 ?>
 <?php
 readfile("tops.html");
 ?>
	<div id="main_block" class="style1">																																																																													
				<div id="item">
					<h4>Agency Details</h4><br />
					<div class="big_view" style="height:380px">
					<form name="newcust" method ="post" action ="custdetail.php" onSubmit="return cdetail();"> 
						Agency ID <input type="text" size=10 name="cid" id=aid>
						or Name  <input type="text" size=30 name="cname" id=aname>
						<input type="submit" value=" Show " name="submit1">
			
					</form>
<?php
$got=0;
if(isset($_POST['submit1']))
{
	if(strlen($_POST['cid'])>0)
	{
	$id=$_POST['cid'];
	$got=1;
	}
	elseif(strlen($_POST['cname'])>0)
	{
	$name=$_POST['cname'];
	$got=2;
	}
}
elseif(isset($_GET['d']))
{
$id=$_GET['e'];
$got=3;
}
elseif(isset($_GET['upd']))
{
$a1=$_GET['a1'];
$a2=$_GET['a2'];
$a3=$_GET['a3'];
$a4=$_GET['a4'];
$a5=$_GET['a5'];
$a6=$_GET['a6'];
$a7=$_GET['a7'];
$got=4;
}
elseif(isset($_GET['a']))
{
$id=$_GET['a'];
$got=1;
}
if(isset($_GET['b']))
{
$lowlim=$_GET['b'];
$name=$_GET['c'];
$got=2;
}
else
{
$lowlim=0;
}
$uplim=$lowlim+5;
if($got==1)
{
mysql_connect("localhost","root","") or die(mysql_error("Connection FAILED.")); 
mysql_select_db("oxygen") or die(mysql_error("Unable to Connect to Database")); 
$sql="select * from customer where cid='".$id."'";
$rs = mysql_query($sql)or die(mysql_error());

$nm="aa";
$rcount = mysql_num_rows($rs);
if($rcount>0)
{
  while($row = mysql_fetch_array( $rs )) 	
 {
$cid=$row['cid'];
$cname=$row['cname'];
$cadd=$row['cadd'];
$coff=$row['coff'];
$chome=$row['chome'];
$cmob=$row['cmob'];
$status=$row['status'];
$regdate=$row['regdate'];
$actdate=$row['actdate'];
}

$sql="select * from rptable where dr LIKE '%AGENCY DEPOSIT%' AND cr='".$id."'";
$rs = mysql_query($sql)or die(mysql_error());
$dp=0;
$damt=0;
  while($row = mysql_fetch_array( $rs )) 	
 {
$dp=$dp+$row['comment'];
$damt=$damt+$row['amount'];
}

echo("<table border=5 cellpadding=0 cellspacing=0 class=cust><tr><td> Agency Id <td> ".$cid."</tr>");
echo("<tr><td> Agency Name <td> ".$cname."</tr>");
echo("<tr><td width=150> Agency Address <td> ".$cadd."</tr>");
echo("<tr><td> Phone (Office) <td> ".$coff."</tr>");
echo("<tr><td> TIN/VAT <td> ".$chome."</tr>");
echo("<tr><td> Cellphone <td> ".$cmob."</tr>");
echo("<tr><td> Registration Date <td> ".$regdate."</tr>");
echo("<tr><td> Status <td> ".$status."</tr>");
echo("<tr><td> Activation Date <td> ".$actdate."</tr>");
echo("<tr><td> Allowed Cylinders <td> ".$dp."</tr>");
echo("<tr><td> Deposited Amount <td> ".$damt."</tr>");
echo("<tr><td colspan=2 align=center>From <input type=text id=dt1 size=11>(DD-MM-YYYY) To <input type=text id=dt2 size=11>(DD-MM-YYYY) ");
echo("<br><input type=button name=ledshow value=\"Print Statement\" onClick=\"ledprint(".$id.");\"></tr>");

echo("<tr><td colspan=2 align=right> <a href=\"custdetail.php?&e=".$id."&d=1\">Update Agency Detail</a></tr></table>");
}
else
{
echo("No Agency To Show.");
}
}
if($got==2)
{
mysql_connect("localhost","root","") or die(mysql_error("Connection FAILED.")); 
mysql_select_db("oxygen") or die(mysql_error("Unable to Connect to Database"));
$sql1="select * from customer where cname like '%".$name."%'";
$rs1 = mysql_query($sql1)or die(mysql_error());
$rcount = mysql_num_rows($rs1); 
$sql="select * from customer where cname like '%".$name."%' limit ".$lowlim.",".$uplim."";
$rs = mysql_query($sql)or die(mysql_error());
echo("<table border=5 cellpadding=1 cellspacing=1 class=cust><tr><th width=30>Id <th width=100> Name <th> Address</tr>");
$rcount = mysql_num_rows($rs);
if($rcount>0)
{

  while($row = mysql_fetch_array( $rs )) 	
 {
$cid=$row['cid'];
$cname=$row['cname'];
$cadd=$row['cadd'];
echo("<tr><td> ".$cid."<td> <a href=\" custdetail.php?&a=".$cid."\">".$cname."</a><td> ".$cadd."</tr>");
}
}
else{echo("<tr><td colspan=3> No Agency to Show</tr>");}
echo("</table>");
if($rcount>5)
{
if($lowlim>=5 && $lowlim<=($rcount-5))
{
echo("<span><a href=\"custdetail.php?&b=".($lowlim-5)."&c=".$name."\">Previous</a> ");
echo(" <a href=\"custdetail.php?&b=".($lowlim+5)."&c=".$name."\">Next</a></span>");
}
elseif($lowlim<5)
{
echo("<span> <a href=\"custdetail.php?&b=".($lowlim+5)."&c=".$name."\">Next</a></span>");
}
elseif($lowlim>($rcount-5))
{
echo("<span><a href=\"custdetail.php?&b=".($lowlim-5)."&c=".$name."\">Previous</a> </span>");
}
}
}
if($got==3)
{
mysql_connect("localhost","root","") or die(mysql_error("Connection FAILED.")); 
mysql_select_db("oxygen") or die(mysql_error("Unable to Connect to Database"));
$sql1="select * from customer where cid =".$id."";
$rs1 = mysql_query($sql1)or die(mysql_error());
$rcount = mysql_num_rows($rs1); 
 while($row = mysql_fetch_array( $rs1 )) 	
 {
$cid=$row['cid'];
$cname=$row['cname'];
$cadd=$row['cadd'];
$coff=$row['coff'];
$chome=$row['chome'];
$cmob=$row['cmob'];
$status=$row['status'];
$regdate=$row['regdate'];
$actdate=$row['actdate'];

}
echo("<table border=5 cellpadding=0 cellspacing=0 class=cust style=\"background-color:lightgreen;\"><tr><td> Agency Id <td><form name =edit action =custdetail.php method =get> <input type = hidden name =a1 value= '".$cid."'>".$cid."</tr>");
echo("<tr><td> Agency Name <td> <input type = text name =a2 value= '".$cname."'></tr>");
echo("<tr><td width=150> Agency Address <td><input type = text name =a3 value= '".$cadd."'></tr>");
echo("<tr><td> Phone (Office) <td> <input type = text name =a4 value= '".$coff."'></tr>");
echo("<tr><td> Phone (Home) <td> <input type = text name =a5 value= '".$chome."'></tr>");
echo("<tr><td> Cellphone <td> <input type = text name =a6 value= '".$cmob."'></tr>");
echo("<tr><td> Status <td> <input type = text name =a7 value= '".$status."'></tr>");
echo("<span><input type = submit name =upd value= DONE></span>");
echo("</form></table>");
if($rcount>5)
{
if($lowlim>=5 && $lowlim<=($rcount-5))
{
echo("<span><a href=\"custdetail.php?&b=".($lowlim-5)."&c=".$name."\">Previous</a> ");
echo(" <a href=\"custdetail.php?&b=".($lowlim+5)."&c=".$name."\">Next</a></span>");
}
elseif($lowlim<5)
{
echo("<span> <a href=\"custdetail.php?&b=".($lowlim+5)."&c=".$name."\">Next</a></span>");
}
elseif($lowlim>($rcount-5))
{
echo("<span><a href=\"custdetail.php?&b=".($lowlim-5)."&c=".$name."\">Previous</a></span> ");
}
}
}
if($got==4)
{
mysql_connect("localhost","root","") or die(mysql_error("Connection FAILED.")); 
mysql_select_db("oxygen") or die(mysql_error("Unable to Connect to Database"));
$sql="update customer set cname='".$a2."',cadd='".$a3."',coff='".$a4."',chome='".$a5."',cmob='".$a6."',status='".$a7."' where cid =".$a1."";
$rs = mysql_query($sql)or die(mysql_error());
if($rs) 	
 {
echo("<br> <br>  <br><h3>Update Successfully Done!</h3>");
}
else 	
{
echo("Update Failed!");
}
}
?>
<span>
						
											
</span>
					</div>
				
				</div>

				<div class="description">
					<p>
						<strong>How to do?</strong><br /> 
						Enter Agency ID to view Details.
						<br /> or Enter Name to search ID.
						<br /> You can enter some letters of name to find matching agencies.
						<br /> 
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
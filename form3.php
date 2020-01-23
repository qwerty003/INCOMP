<?php
session_start() or die();
?>
<?php
$user = $_SESSION["user"];
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database"));
function dat($date)
{
	$day = substr($_POST['professional_t4'],0,2);
	$month = substr($_POST['professional_t4'],3,2);
	$year = substr($_POST['professional_t4'],6,4);
	$date = $year.'-'.$month.'-'.$day ;
	return $date ;
	
}
if(isset($_POST['s2']))
{
	$errorcheck = 0;
    $error = "";
	
	//personal-info-array
	$personals = array("gender" => $_POST['personal_r1'],"college"=>$_POST['personal_t4'],"degree"=>$_POST['personal_t5'],"dob"=>dat($_POST['personal_t6']));
	
	//$professionals-info-array 
	$professionals = array("orgid" => $_POST['professional_t1'],"dept" => $_POST['professional_t2'],"desn" => $_POST['professional_t3'],"tenure" => $_POST['professional_t5'],"doj" => dat($_POST['professional_t4']));
	
	//contact-info-array
	$contacts = array("phone"=>$_POST['contact_t1'],"address"=>$_POST['contact_t2'],"website"=>$_POST['contact_t3'],"linkedin"=>$_POST['contact_t4'],"github"=>$_POST['contact_t5']);
		
	
	//all fields merged into one array
    $all = array_merge($personals,$professionals,$contacts);	
	
	
	//filtering data from user
    $all = array_map('trim' , $all);
	$all = array_map('strip_tags' , $all);
	
	//$day = substr($_POST['professional_t4'],0,2);
	//$month = substr($_POST['professional_t4'],3,2);
	//$year = substr($_POST['professional_t4'],6,4);
	//$all['doj'] = $year.'-'.$month.'-'.$day ;
	
	
	//Checking for spaces and unaccepted characters in data
    /*foreach($all as $field => $value)
    {
        if(preg_match('/\s/', $value))
        {
    	    $error =  "No spaces are allowed";
    	    $errorcheck = 1;
    	
        }
    }*/
	
	//Validate Phone#
	if(!preg_match('/^([0-9]){10}$/', $contacts["phone"]))
	{
    	$error =  "Invalid Phone#";
		$errorcheck = 1;
		
    }
	
	
	if($errorcheck == 0)
	{
		//update data into mysql tables
		
		//Record upadte in table 'personal' 
        $sql2 = "update personal set gender = '".$all["gender"]."';";
        mysql_query($sql2)or die(mysql_error());
		
		
		//Record update in table 'professional'
        $sql3 = "update professional set orgid = '".$all["orgid"]."',dept = '".$all["dept"]."',desn = '".$all["desn"]."',tenure = '".$all["tenure"]."',doj = '".$all["doj"]."' where uname = '".$user."' ;";
        mysql_query($sql3)or die(mysql_error());		
		
		//Record update in table 'contact'
		
		
		include('main.php');
		
	}
	
	else
	{
		include('form3.html');
		echo '<center> <p> ';
		echo("$error");
	}
	
	
	
}

else
{
	//Fetching and pre filling data into form
	$user = $_SESSION["user"];
	$sql = "SELECT * FROM professional where uname = '".$user."'";
	$info = mysql_query($sql) or die(mysql_error());
	$rs = mysql_fetch_array($info);
	
	?>
	
	<html>
	<head>
	<link rel = "stylesheet" type = "text/css" href = "form.css" />
	<title>
	Update profile
	</title>
	</head>
	<body>
	<form action = "form3.php" method = "POST">
	<h1> Update Profile </h1><br><br>
	
	
	
	<div class = "title">
	Personal details 
	</div>
	<br>
	
	<div class = "main">
	
	Gender : <input type = "radio" name = "personal_r1" value = "male"/>Male <input type = "radio" name = "personal_r1" value = "female"/>Female<br><br> 
	College : <input type = "password" name = "personal_t4"/>
	Degree : <input type = "password" name = "personal_t5"/><br><br>  
	DOB : <input type = "text" name = "personal_t6"/><br><br>
	Country:  <select name = "country"><option value = "india">India<option value = "france">France</select><br><br>
	<?php
	if(isset($_POST['country']))
	{
	    //$c = $_POST['country'];
	}
	?>
	State : <select name = "state"><option value = "bihar">Bihar<option value = "delhi">Delhi</select><br><br><br>
	</div>
	
	<br><br>
	
	<div class = "title">
	Professional details 
	</div>
	<br>
	
	<div class = "main">
	<?php echo 'OrganisationID :<input type = "text" name = "professional_t1" value = "'.$rs['orgid'].'"/><br><br>'; ?>
	<?php echo 'Department* :  <input type = "text" name = "professional_t2" value = "'.$rs['dept'].'"/><br><br>'; ?>
	<?php echo 'Designation* : <input type = "text" name = "professional_t3" value = "'.$rs['desn'].'"/><br><br>'; ?> 
	<?php echo 'DOJ : <input type = "text" name = "professional_t4" value = "'.$rs['doj'].'"/><br><br>'; ?>
	<?php echo 'Tenure : <input type = "text" name = "professional_t5" value = "'.$rs['tenure'].'"/><br><br><br>'; ?>
	</div>
	
	<br><br>
	
	<div class = "title">
	Contact details 
	</div>
	<br>
	
	<div class = "main">
	Phone # :<input type = "text" name = "contact_t1"/><br><br>
	Address : <input type = "text" name = "contact_t2"/><br><br>
	Website : <input type = "text" name = "contact_t3"/><br><br> 
	Linkedin link : <input type = "text" name = "contact_t4"/><br><br>
	Github link :  <input type = "text" name = "contact_t5"/><br><br><br>
	</div>
	<br> <br>
	
	<center>
	<input type = "submit" name = "s2" value = "UPDATE"/>
	</center>
	
	</form>
	</body>
	</html>
	
	
	
	
<?php	

}


?>









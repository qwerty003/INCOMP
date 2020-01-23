<?php
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database")); 
if(isset($_POST['s1']))
{
	$errorcheck = 0;
    $error = "";
	// Taking user input in array
	$credens = array("fname" => $_POST['t1'],"lname"=>$_POST['t2'],"uname"=>$_POST['t3'],"upass"=>$_POST['t4'],"confpass"=>$_POST['t5'],"email"=>$_POST['t6']);
    
	//Making entered data usable
    $credens = array_map('trim' , $credens);
	$credens = array_map('strip_tags' , $credens);
	
	//Checking for spaces and unaccepted characters in data
	foreach($credens as $field => $value)
	{
	    if(preg_match('/\s/', $value))
	    {
    	    $error =  "No spaces are allowed";
		    $errorcheck = 1;
		
        }
		if($value == "")
		{
			$error =  "All fields are compulsory";
			$errorcheck = 1;
		}
	}
	//Checking whether each field has a value
	
	
	
	//Validate EmailID
	if(!preg_match('/^([a-zA-Z0-9_])*@([a-zA-Z0-9_])*\.com$/', $credens["email"]))
	{
    	$error =  "Invalid EmailID";
		$errorcheck = 1;
    }
	
	//Match passwords
	if($credens["upass"]!=$credens["confpass"])
    {
		$error =  "Passwords don't match";
	    $errorcheck = 1;
	}
	
	
	if($errorcheck == 0)
	{
		//Record entry in table 'login'
        $sql2 = "insert into login values('".$credens["uname"]."','".$credens["upass"]."','".$credens["fname"]."','".$credens["lname"]."','".$credens["email"]."');";
		$rs2 = mysql_query($sql2)or die(mysql_error());
		
		//Record entry in table 'personal' 
        $sql2 = "insert into personal values('".$credens["uname"]."',NULL);";
        mysql_query($sql2)or die(mysql_error());  				
		
		//Record entry in table 'professional'
        $sql3 = "insert into professional values('".$credens["uname"]."',NULL,NULL,NULL,NULL,NULL);";
        mysql_query($sql3)or die(mysql_error());  		
		
		//Record entry in table 'contact'
		
		session_start();
		$_SESSION["user"] = $credens['uname'];
		
		include('form3.php');
			
    }
	
		
	else
	{
		include('form.html');
		echo '<center> <p> ';
		echo("$error");
	}
	
	

}
else
{

include('form.html');

}
?>




























<?php
mysql_connect("localhost","root","") or die(mysql_error());
// Create Database
$createdb="CREATE DATABASE IF NOT EXISTS ss";
mysql_query($createdb);

//Select database
mysql_select_db("ss") or die(mysql_error("Unable to Connect to Database"));

//Create tables in database  
$createt1="CREATE TABLE IF NOT EXISTS `ss`.`login` (`uname` VARCHAR( 20 ) NOT NULL ,`upass` VARCHAR( 10 ) NOT NULL , `fname` VARCHAR( 15 ) NOT NULL , `lname` VARCHAR( 15 ) , `email` VARCHAR( 30 ) NOT NULL ,PRIMARY KEY (`uname` )) ENGINE = INNODB";
mysql_query($createt1);


$createt2="CREATE TABLE IF NOT EXISTS `ss`.`personal` (`uname` VARCHAR( 20 ) NOT NULL ,`gender` VARCHAR( 1 ) ,PRIMARY KEY (`uname`)) ENGINE = INNODB";
mysql_query($createt2);

$createt3="CREATE TABLE IF NOT EXISTS `ss`.`professional` (`uname` VARCHAR( 20 ) NOT NULL ,`orgid` VARCHAR( 10 ) ,`dept` VARCHAR( 30 ) , `desn` VARCHAR( 30 ) , `tenure` INTEGER( 2 ), `doj` DATE , PRIMARY KEY (`uname` )) ENGINE = INNODB";
mysql_query($createt3);

$createt4="CREATE TABLE IF NOT EXISTS `ss`.`contact` (`uname` VARCHAR( 20 ) , `phone` INTEGER( 11 ) ,`address` VARCHAR( 80 ) ,`website` VARCHAR( 20 ) ,`linkedin` VARCHAR( 40 ) ,`github` VARCHAR( 40 ) , PRIMARY KEY (`uname` )) ENGINE = INNODB";
mysql_query($createt4);

$createt5="CREATE TABLE IF NOT EXISTS `ss`.`mail` (`mailid` INTEGER( 4 ) PRIMARY KEY AUTO_INCREMENT,`sender` VARCHAR( 20 ) NOT NULL ,`reciever` VARCHAR( 20 ) NOT NULL ,`subject` VARCHAR( 30 ) , `body` VARCHAR( 100 ) , `date` DATE , `time` TIME) ENGINE = INNODB";
mysql_query($createt5);

$check = 1;

if(isset($_POST['welcome_s1']))
{
	$sql="select * from login";
    $info = mysql_query($sql)or die(mysql_error());
	$rcount = mysql_num_rows($info);
    if($rcount>0)
    {
	  $uu=$_POST["welcome_t1"];
      $up=$_POST["welcome_t2"];
	  while($row = mysql_fetch_array( $info )) 	
      {
		 if($row['uname']==$uu && $row['upass']==$up)
		 {
			 session_start();
			 $_SESSION["user"] = $row['uname'];
			 include('main.php');
			 $check=0;
			 break;
		 }
		 
	  }
	  if($check == 1)
	  {
		  include('welcome.php');
	  }
	}
	
}

elseif(isset($_POST['welcome_s2']))
{
    $uu=$_POST["welcome_t3"];
    $up=$_POST["welcome_t4"];
	if ($uu=="xyz" && $up=="123")
	{
		include('main.php');
	}
	else
	{
		include('welcome.php');
	}
}

elseif(isset($_POST['welcome_btn1']))
{
    include('form.php');
}

else
{
	include('welcome.php');
}
		
		


?>
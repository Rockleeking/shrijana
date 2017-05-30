<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Srijana Gyan Sagar School</title>


<link type="text/css" href="main_csss.css" rel="stylesheet" />
<!--menu links -->
 <link type="text/css" href="menu.css" rel="stylesheet" />
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="menu.js"></script>
<!-- end menu links -->
</head>

<body>
<?php
session_start();
if(!$_SESSION){
$_SESSION["uname"]='';
}
if(isset($_SESSION)){
if($_SESSION["uname"]){
header("location:managearticle.php");
}
}
$connection=mysql_connect("localhost","root","");
if(!$connection){
	die("Database connection failed:".mysql_error());
}

$select_db=mysql_select_db("ssgs",$connection);
if(!$select_db){
	die("Database selection failed:".mysql_error());
}


?>
<center>
<table width="940" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top">
    <td height="162" colspan="2">
    <!-- top banner -->
	    <div class="topmainlogo"><img src="ms_image/main_school_logo.png" width="382" height="110" border="0" /></div>
    <div class="topleftlinks">
    
    <div class="topsignupicons">
    <img src="ms_image/support_icon.png" style="float:left;" /><div class="topsignupiconstext"><a href="register.php" class="topsignupiconstext">&nbsp;Register</a> </div> 
    <img src="ms_image/email_icon.png" style="float:left; margin-left:15px;" /><div class="topsignupiconstext"><a href="login.php" class="topsignupiconstext">&nbsp;Sign-in</a></div>
    <img src="ms_image/feedback_icon.png" style="float:left; margin-left:15px;" /><div class="topsignupiconstext"><a href="feedback.php" class="topsignupiconstext">&nbsp;Site Feedback</a></div>
    </div><br />
    <br />

    <p style="color:#fff; font-size:15px; margin-top:10px; display:block;">School's Song:<audio controls width="200px">
   <source src="ms_image/schoolsong.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio></p> 
    
    </div>    <!-- end top banner -->
    </td>
    </tr>
  <tr align="left" valign="top">
    <td colspan="2">
    <!--menu -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="7%" align="left" valign="top"><a href="index.php"><img src="ms_image/menu_home.jpg" width="67" height="50" border="0" /></a></td>
    <td width="92%" background="ms_image/menu2.jpg" align="left" valign="top">
    <div id="menu" align="center">
    <span style="color:red; font-size: large;">PLease login to continue....</span>
</div>    </td>
    <td width="1%" align="left" valign="top"><img src="ms_image/menu_last.jpg" /></td>
  </tr>
</table>

    <!-- end menu -->
    </td>
    </tr>
 

  <tr align="left" valign="top">
    <td colspan="2">
    <div style="margin:35px 0 0 0;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top">
    <td width="613" rowspan="3">
    <div class="modelsrijanawelcometext">
    LOGIN
    </div>
    <div class="modelsrijanawelcometext2a">
<form method="POST" action="">
<div name="error" style="color:red; font-size:large;">
<?php
$uname="";
$pwd="";
if($_POST){
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
if($uname=="" || $pwd=="")
{
echo "All fields required";
}
elseif(strlen($uname)<6 || strlen($uname)>20)
{
echo "Length of Username name should be more than 6 and less than 20 characters";
}elseif(strlen($pwd)<6 || strlen($pwd)>20)
{
echo "Length of password should be more than 6 and less than 20 characters";
}elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pwd))
{
$passwordErr = "Your Password Must Contain At Least 1 Charaters!";
				echo $passwordErr;
				}
    elseif(!preg_match("#[A-Z]+#",$pwd)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
				echo $passwordErr;

    }
    elseif(!preg_match("#[a-z]+#",$pwd)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
				echo $passwordErr;

    }elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $uname))
{
$passwordErr = "Your User Name Must Contain At Least 1 Charaters!";
				echo $passwordErr;
				}else{
$sql1='SELECT * FROM tbl_login WHERE uname="'.$uname.'" AND pwd="'.$pwd.'"';//" OR "1"="1
$result1=mysql_query($sql1,$connection);
$num1=mysql_num_rows($result1);
if($num1>0){
$_SESSION["uname"]=$uname;
header("location:managearticle.php");
}else{
echo "error";
}
}
}
?>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="left">
    <td width="22%" align="left"  height="40">User Name:</td>
    <td width="78%" align="left"  ><input type="text" name="uname" value="<?php echo $uname;?>" /></td>
    </tr>
	<tr align="left">
    <td width="22%" align="left"  height="40">Password:</td>
    <td width="78%" align="left"  ><input type="password" name="pwd" value="<?php echo $pwd;?>" /></td>
    </tr>
    <tr align="left">
    <td width="22%" align="left"  height="40"><input type="reset" name="clearbtn" value="Clear" /></td>
    <td width="78%" align="left"  ><input type="submit" name="submitbtn" value="LOGIN" /></td>
    </tr>
    </table>
</form>
    </div>
    <!-- latest article --></td>
    <td width="25" rowspan="4"><div class="line2" style="margin:0 0 0 0; height:200px;"></div>
    <div class="line2" style="margin:50px 0 0 0; height:260px;"></div>
    </td>
    <td width="302" height="200">
    </td>
  </tr>
  <tr align="left" valign="top">
    <td><div class="line1" style="margin:12px 0 12px 0;"></div></td>
  </tr>
  <tr align="left" valign="top">
    <td>
      <div style="margin-left:10px; width:284px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  
</table>

    </div>    </td>
  </tr>

    </table>

    </div>
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div class="footerbg">
<div style="margin:10px 0 0 0;">
<table width="940" border="0" cellspacing="0" cellpadding="0">
  <tr align="left" valign="top">
    <td width="314">
    <div class="footerlinktitle">
    Links:
    </div>
    <div style="float:left; margin:5px 0 0 0;">
    <a href="index.php" class="footerlinkname">Home</a> <br />
    <a href="aboutus.php" class="footerlinkname">About us</a> <br />
    <a href="staffs.php" class="footerlinkname">Staffs</a><br />
    <a href="facilities.php" class="footerlinkname">Facilities</a>
    </div>
    <div style="float:left; margin:5px 0 0 55px;">
    <a href="article.php" class="footerlinkname">Article</a> <br />
    <a href="noticeboard.php" class="footerlinkname">Notice board</a> <br />
    <a href="onlineresult.php" class="footerlinkname">Online Results</a><br />
    <a href="contact_us.php" class="footerlinkname">Contact us</a>
    </div>
    </td>
    <td width="397"><div class="footerlinktitle"> Contacts: </div>
      <div style="float:left; margin:5px 0 15px 0;"> 
        <span style="color:#fff;"><strong>Srijana Gyan Sagar School</strong><br />
        Goldhunga-1, Sundar Basti (Lolang), Kathmandu, Nepal<br />
          Tel.No.: <strong>+977 01 5136126</strong><br />
          School Notice Board: <strong>1618-01-5136135</strong><br />
          Email: <a href="mailto:srijanagyansagar@gmail.com"><strong>srijanagyansagar@gmail.com</strong></a></span>
      </div></td>
    <td width="229"><div class="footerlinktitle"> Powered By: </div>
      <div style="float:left; margin:10px 0 0 0;"> 
      <a href="https://www.facebook.com/grishma.thapaliya.5" target="_blank">
      <img src="ms_image/lnslogo.png" border="0" height="100" width="100" />
      </a>
      </div></td>
  </tr>
  <tr>
    <td colspan="3"  height="1">
    <div class="footerbg11"></div>
    </td>
    </tr>
  
</table>
</div></div>
</center>
</body>
</html>
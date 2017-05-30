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
if(!$_SESSION["uname"]){
header("location:login.php");
}
if (isset($_GET["logout"])){
$_SESSION["uname"]="";
header("location:login.php");
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
    <div id="menu">
    <ul class="menu">
        <li><a href="managearticle.php" class="parent"><span>Manage Articles</span></a>
		<div><ul>
                <li><a href="function.php" class="parent"><span>New Article</span></a>
                    
                </li></ul></div>
        </li>
        <li><a href="managenotices.php" ><span>Manage Notices</span></a>
		<div><ul>
                <li><a href="function1.php" class="parent"><span>New Notice</span></a>
                    
                </li></ul></div></li>
				<li><a href="viewfeedback.php" class="parent"><span>View Feedbacks</span></a></li>
        <li><a href="?logout=1" /><span>Logout<span/></span></li>
        
    </ul>
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
    Feedback
    </div>
     <div>
	 <?php 

//echo'<a href="function.php" >Add Article</a><br />';
if(isset($_GET['artid']))
{
$artiddel=$_GET['artid'];

$sql2='delete FROM tbl_feedback where fid="'.$artiddel.'"';
$result2=mysql_query($sql2,$connection);
}
?>
<?php
$sql1='SELECT * FROm tbl_feedback';
$result1=mysql_query($sql1,$connection);
//$num1=mysql_num_rows($result1);
while($row=mysql_fetch_array($result1))
{
$artid=$row["fid"];
 echo'<div style="float:left; font-size:15px; margin:25px 0 0 0;">
    <img src="ms_image/feedback.jpg" height="50" width="50"/>
    </div>
    <a href="#" class="latestarticle1">'.$row["subject"].'</a> 
    <div class="latestarticle2" style="font-size:15px;">'.$row["feedback"].'<br/><div align="right" class="allreadmore" style="margin:2px 0 10px 0;">Name:'.$row["name"].'  | Email: '.$row["email"].'</div>
	<br/>	`<div align="right" class="allreadmore" style="margin:2px 0 10px 0;">Phone No:'.$row["contactno"].'  | Address: '.$row["address"].'</div></div>';
	
	echo "<br />";
	echo '<a href="viewfeedback.php?artid='.$artid.'"> Delete</a> <br />';
	}



?>
</div>    </div>
    

    
    <!-- latest article --></td>
    <td width="25" rowspan="4"><div class="line2" style="margin:0 0 0 0; height:200px;"></div>
    <div class="line2" style="margin:50px 0 0 0; height:260px;"></div>
    </td>
    <td width="302" height="200">
	<h3>Upload Results here.....</h3>
	<form enctype="multipart/form-data" action="" method="POST">
		<fieldset >
	<legend><b>Upload Result</b></legend>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
	<input type="file" name="upload"/>
	<input type="submit" name="filesub"/>
	
	<?php
	if(isset($_POST['filesub']) && $_FILES['upload']['size'] > 0)
{
$fileName = $_FILES['upload']['name'];
$tmpName  = $_FILES['upload']['tmp_name'];
$fileSize = $_FILES['upload']['size'];
$fileType = $_FILES['upload']['type'];
$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

mysql_query($query) or die('Error, query failed'); 
move_uploaded_file($_FILES['upload']['tmp_name'],"Resources/".$_FILES['upload']['name']."");
echo "<br>File $fileName uploaded<br>";
} 

//	if($_POST["filesub"]){
//	if(move_uploaded_file($_FILES['upload']['tmp_name'],"images/".$_FILES['upload']['name']."")){
//		echo"upload sucess";
//	header('location:function1.php');
//		}else{
		
//			echo "unsucessful";
//	}}
	
	?>
	</fieldset>
	</form>
	
    </td>
  </tr>
  <tr align="left" valign="top">
    <td><div class="line1" style="margin:12px 0 12px 0;">
	
	</div>
	<div>
	<span><u><b>Result</b></u></span><br /><br />
	<?php
if(isset($_GET['id'])) 
{
// if id is set then get the file with the id from database

$id    = $_GET['id'];
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";

$result = mysql_query($query) or die('Error, query failed');
list($name, $type, $size, $content) = mysql_fetch_array($result);
header("location: ".$name."");
echo $content; 
exit;
}
?>
<?php
if(isset($_GET['filid']))
{
$fildel=$_GET['filid'];

$sql3='delete FROm upload where id="'.$fildel.'"';
$result3=mysql_query($sql3,$connection);
}
$query = "SELECT id, name FROM upload";
$result = mysql_query($query) or die('Error, query failed');
if(mysql_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
while(list($id, $name) = mysql_fetch_array($result))
{
echo'File '.$id.'&nbsp; ';
echo'<a href="Resources/'.$name.'"</a> '.$name.'&nbsp;&nbsp;&nbsp;';
	echo '<a href="?filid='.$id.'" style="color:pink;"> Delete</a> <br />';

}
}
?></div></td>
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
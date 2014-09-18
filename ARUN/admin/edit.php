<?
include("includes/config.php");
?>
<?php
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id ,$login, $firstname, $error)
 {
 ?>
 
  
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<div id="site">
<div id="site_top">
  <p class="heading">&nbsp;</p>
  <p class="heading">Admin Page</p>
  
</div>
<div id="site_space">

</div>
<div id="site_content">
<div id="site_content_head">
Managepages
</div>
<div id="site_content_details">
<form action="" method="post">
    <input type="hidden" name="id" value="<?=$id?>" />
    <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="120" height="40">Page Name</td>
        <td width="20" height="40" align="center">:</td>
        <td height="40">
        <input type="text" name="login" id="login"  readonly="readonly" value="<?=$login?>" />
        </td>
      </tr>
      <tr>
        <td width="120" height="40">Contents</td>
        <td width="20" height="40" align="center">:</td>
        <td height="40">
        
         <textarea name="firstname" style="width:350px; height:150px;" id="firstname"><?=$firstname?></textarea>
		
        </td>
      </tr>
      <tr>
        <td width="120" height="40">&nbsp;</td>
        <td width="20" height="40" align="center">&nbsp;</td>
        <td height="40">
       <input type="submit" name="submit" value="Submit" class="frmSubmit">
        </td>
      </tr>
    </table>
    </form>
    
</div>
</div>
<div id="site_bottom">
</div>
</div>
</body>
</html>
 
  <?php
 }
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid  pageName
 $id = $_POST['id'];
 
 $firstname = $_POST['firstname'];
 
  
 // check that firstname/lastname fields are both filled in
 if ($firstname == '')
 {
	
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 //renderForm($id, $firstname, $error);
 }
 else
 {
	 
//echo $id;
 // save the data to the database
 mysql_query("UPDATE members SET firstname='$firstname' WHERE id='$id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: index.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 
 echo 'Error!';
 $id = $_POST['id'];
 echo $id;
 
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM members WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $login = $row['login'];
 $firstname = $row['firstname'];
 
 // show form
 renderForm($id, $login, $firstname, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error2!';
 }
 }
?>
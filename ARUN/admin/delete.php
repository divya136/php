<?php

 // connect to the database
 include("includes/config.php");

 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM members WHERE id=$id")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: index.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: index.php");
 }
 
?>
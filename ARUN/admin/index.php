<?
include("includes/config.php");
/*require('includes/db_functions.php');
require('includes/general_functions.php');*/
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

<?php


        // get results from database
        $result = mysql_query("SELECT * FROM members") 
                or die(mysql_error());  
                
				
				
						
        // display data in table
             
        echo "<table border='0' align='center' cellpadding='10'>";
        echo "<tr> <th>Page ID</th> <th>Page Name</th>  <th>Action</th> <th></th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['login'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><img src="image/edit.png"> </a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><img src="image/delete.png"></a></td>';
                echo "</tr>"; 
        } 
          
		    /*echo "<tr>";
                echo '<td></td>';
                echo '<td></td>';
                echo '<td> <a href="add_pages.php" class="frmSubmit" title="Add Page" rel="gb_page_center[400, 150]">Add Pages</a></td>';
                echo '<td></td>';
                echo "</tr>"; 
				*/
        // close table>
        echo "</table>";
?>
  
</div>
</div>
<div id="site_bottom">
</div>
</div>
</body>
</html>
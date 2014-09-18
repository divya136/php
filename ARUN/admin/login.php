<?
	require('includes/config.php');
	require('includes/db_functions.php');
	require('includes/general_functions.php');
	
	if(isset($_SESSION['userID']) && $_SESSION['userID'] != ''){
		redirectPage('index');
	}
?>

<?
	//Coding for Login
	if(isset($_POST['submitBtn'])){
		$username	= $_POST['username'];
		$password	= encrypt($_POST['password']);
		
		if($username == ''){
			$sMsg = '<span class="red">Username is Empty!</span>';
			$footerScript = focus('username');
		}else if($password == ''){
			$sMsg = '<span class="red">Password is Empty!</span>';
			$footerScript = focus('password');
		}else if(!validateRecord('admin', array('username' => $username))){
			$sMsg = '<span class="red">Invalid Username</span>';
			$footerScript = focus('username');
		}else if(!validateRecord('admin', array('username' => $username, 'password' => $password))){
			$sMsg = '<span class="red">Invalid Password!</span>';
			$footerScript = focus('password');
		}else if(!validateRecord('admin', array('username' => $username, 'password' => $password, 'status' => 'A'))){
			$sMsg = '<span class="red">Your Account Suspended by Admin!</span>';
			$footerScript = focus('username');
		}else{
			$sql = 'SELECT * FROM admin WHERE username = "'.$username.'"';
			
			$res = mysql_query($sql);
			$row = mysql_fetch_array($res);
			
			$_SESSION['userID'] = $row['userID'];
			$_SESSION['userName'] = $row['name'];
			
			redirectPage('index');
		}
		
		$password	= '';
	}else{
		$username	= '';
		$footerScript = focus('username');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>.:: Login - BigBen Dry Cleaners ::.</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />


<style type="text/css">
#site {
	width:100%; 
}
#site #header_wrapper {
	background-color:#000;
	height:86px;
	padding:2%;
}
#site #header {
	width:100%; 
	margin:0 auto; 
	height:86px; 
	background-color:#000; 
}
#site #left {
	float:left; 
	background-repeat:no-repeat; 
	background-position:left; 
	height:500px; 
	width:725px;
}
#site #right {
	float:right; 
	width:200px; 
	height:155px; 
	background-image:url(images/login_bg_panel_bg.png); 
	background-repeat:no-repeat; 
	background-position:center center; 
	margin-top:225px; 
	margin-right:3%; 
	padding-top:120px; 
	color:#FFF;
}
#site .login_btn {
	background-image:url(images/login_btn_bg.png);
	background-repeat:repeat-x; 
	padding:5px 10px; 
	border:none; 
	cursor:pointer; 
	outline:none; 
	display:block;
	float:right;
}
#site .login_btn:hover {
	color:#FFF;
	background-color:#09F;
	background-image:none;
}
</style>

<!--<script type="text/javascript" src="scripts/crawler.js"></script>-->
</head>
<body>

<div id="site">
<div id="header_wrapper">
	<div id="header">
    <div class="marquee" id="mycrawler2">
    <? /*
    <img src="images/symb-1.png" width="75" height="85" alt="" />
    <img src="images/symb-2.png" width="75" height="85" alt="" />
    <img src="images/symb-3.png" width="75" height="85" alt="" />
    <img src="images/symb-4.png" width="75" height="85" alt="" />
    <img src="images/symb-5.png" width="75" height="85" alt="" />
    <img src="images/symb-6.png" width="75" height="85" alt="" />
    <img src="images/symb-7.png" width="75" height="85" alt="" />
    <img src="images/symb-8.png" width="75" height="85" alt="" />
    <img src="images/symb-9.png" width="75" height="85" alt="" />
    <img src="images/symb-10.png" width="75" height="85" alt="" />
    <img src="images/symb-11.png" width="75" height="85" alt="" />
    <img src="images/symb-12.png" width="75" height="85" alt="" />
    <img src="images/symb-13.png" width="75" height="85" alt="" />
    <img src="images/symb-14.png" width="75" height="85" alt="" />
    <img src="images/symb-15.png" width="75" height="85" alt="" />
    <img src="images/symb-16.png" width="75" height="85" alt="" />
    <img src="images/symb-17.png" width="75" height="85" alt="" />
    <img src="images/symb-18.png" width="75" height="85" alt="" />
    <img src="images/symb-19.png" width="75" height="85" alt="" />
    <img src="images/symb-20.png" width="75" height="85" alt="" />
    <img src="images/symb-21.png" width="75" height="85" alt="" />
    <img src="images/symb-22.png" width="75" height="85" alt="" />
    <img src="images/symb-23.png" width="75" height="85" alt="" />
    <img src="images/symb-24.png" width="75" height="85" alt="" />
    <img src="images/symb-25.png" width="75" height="85" alt="" />
    <img src="images/symb-26.png" width="75" height="85" alt="" />
    <img src="images/symb-27.png" width="75" height="85" alt="" />
    <img src="images/symb-28.png" width="75" height="85" alt="" />
    <img src="images/symb-29.png" width="75" height="85" alt="" />
    <img src="images/symb-30.png" width="75" height="85" alt="" />
    <img src="images/symb-31.png" width="75" height="85" alt="" />
    <img src="images/symb-32.png" width="75" height="85" alt="" />
    <img src="images/symb-33.png" width="75" height="85" alt="" />
    <img src="images/symb-34.png" width="75" height="85" alt="" />
    <img src="images/symb-35.png" width="75" height="85" alt="" />
    <img src="images/symb-36.png" width="75" height="85" alt="" />
    <img src="images/symb-37.png" width="75" height="85" alt="" />
    <img src="images/symb-38.png" width="75" height="85" alt="" />
	*/ ?>
    </div>
    
    <!--<script type="text/javascript">
    marqueeInit({
        uniqueid: 'mycrawler2',
        style: {
            'padding': '2px',
            'width': '100%',
            'height': '86px'
        },
        inc: 5, //speed - pixel increment for each iteration of this marquee's movement
        mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
        moveatleast: 2,
        neutral: 150,
        savedirection: true,
        random: false
    });
    </script>-->
    
    </div>
</div>    
    
  <div id="site_wrapper" style="width:100%; height:500px;">
		<div id="left" style="">
        
        </div>
        
        <div id="right">
        
		<div id="sMsg" style="margin:0; padding:0; width:auto;">
		<?
            if(isset($sMsg)){
                echo $sMsg;
                unset($sMsg);
            }
        ?>
        </div>
        <form action="index.php" method="post">
        
        <table width="170" border="0" align="center" cellpadding="0" cellspacing="0" style="margin:0 auto; display:block;">
          <tr>
            <td height="21" align="left" valign="top">Username</td>
          </tr>
          <tr>
            <td height="32" align="left" valign="top">
            <input type="text" name="username" id="username" value="<?=$username?>" style="display:block; padding:5px; width:155px" />
            </td>
          </tr>
          
          <tr>
            <td height="21" align="left" valign="top">Password</td>
          </tr>
          
          <tr>
            <td height="32" align="left" valign="top">
            <input type="password" name="password" id="password" value="<?=$password?>" style="display:block; padding:5px; width:155px" />
            </td>
          </tr>
          <tr>
            <td height="32" align="left" valign="top">
            <input type="submit" name="submitBtn" value="Login" class="login_btn" />
            </td>
          </tr>
        </table>
        </form>
        </div>
    </div>
</div>

</body>
</html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
	    	body {
		
				background-color: #ADD8E6 ;
		   }
   .topnav{
            
			overflow: hidden;
			background-color: skyblue;
			padding-left:40px;
			background-color: #00008B;
      
           
		}
	/*style the topnav links*/
    .topnav a{
			float: left;
			display: block;
			color: white;
			text-align: center;
			padding: 12px 12px;
			text-decoration: none;
                        font-size: 14px;
		}
	/*change color on hover*/
		.topnav a:hover{
			background-color:Navy;
			color: white;
		}
</style>
</head>
<body style="font-family:Verdana;color:black;">
  <?php

//session_start();

//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" )))
if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="ec"))
{
     echo "<script>window.location.replace('login.php')</script>";
}

else{ ?>
<div style="background-color:white;padding:15px;text-align:center;">
<img src="images/mainheader2.jpg" width="100%" height="200px">

</div>
<div class="topnav">
    <a href="ec_about.php">About</a>
	<a href="poster.php" >Add Photo</a>
<a href="app_paticipants.php">View participants</a>
<a href="Win_run_res.php" >Announce Winner</a>
<a href="logout.php"style="float:right; padding-right:45px;">Logout</a>
    
		

	<!--<a href="login.php" target="_blank" style="float:right; padding-right:45px;">Login</a>-->
</div><?php } ?>
</body>
</html>

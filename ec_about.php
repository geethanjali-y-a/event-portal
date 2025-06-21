<?php
session_start();
include 'dbcon.php';
if (!isset($_SESSION['uid'])&&($_SESSION['utype']=="dc" ))
{
     echo "<script>window.location.replace('index.php')</script>";
}
//else
{
  

  


     
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>yureka</title>  
<link rel="shortcut icon" type="image" href="images/mahadasara logo.jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  color:black;
}
.two{
    color:blue;
}
</style>

<body style="background-color:#ADD8E6;">
<div>
<?php
include('ec_home_page.php');
?>
</div>


     <legend style=" color: #FF5733" ><b>Welcome Event Co-rdinator<?php echo $_SESSION['uid']?></b></legend>
    <form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
    <?php
}
?>
<table class="borderd">
    
    <H1 class="three">Event Coordinator Process</H1>
     <tr>
        <th>SL NO</th>
        <th>Process</th>
    </tr>
    <tr>
         <td>1</td>
        <td> Event Coordinator can Login using the credentials provided<br>
         </td>
     </tr>
     <tr>
         <td>2</td>
        <td> Event Coordinator can Login and approve participants who have participated in respective events.<br>
         </td>
     </tr>
     <tr>
         <td>3</td>
         <td>Events Coordinator will select winners and runners of the respective events.<br>
         </td>
     </tr>
    
     <tr>
         <td>4</td>
         <td>Event coordinator has to upload the events photos and the photos of runner and winners<br>
         </td>
     </tr>
  
    
     </tr>
 </table>
<table class="borderd">
    
    
</body>
</html>

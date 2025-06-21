<!DOCTYPE html>
<html lang="en">
<head>
<title>Yureka</title>  
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

<body style="background-color:white;">
<div>
<?php
include('adminpage.php');
?>
</div>
<?php
session_start();
include 'dbcon.php';
if (!isset($_SESSION['uid'])&&($_SESSION['utype']=="dc" ))
{
     echo "<script>window.location.replace('index.php')</script>";
}
else
{

    ?>
     <legend style=" color: #FF5733" align="left"><?php echo "<b> Welcome User: ".$_SESSION['uid']."</b>";?></legend>
    <form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
    <?php
}
?>
<table class="borderd">
    
    <H1 class="two">Admin  Process</H1>
     <tr>
        <th>SL NO</th>
        <th>Process</th>
    </tr>
    <tr>
         <td>1</td>
        <td> Department Coordinator can login using the Credentials Provided <br>
         </td>
     </tr>
     <tr>
         <td>2</td>
         <td> <br>
         </td>
     </tr>
     
     <tr>
         <TD>3</TD>
         <td> <br>
         </td>
     </tr>
     <tr>
         <td>4</td>
         <td> <br>
         </td>
     </tr>
     
     
 </table>

<table class="borderd">
    
    
</body>
</html>
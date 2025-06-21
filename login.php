<?php

session_start();
 include 'dbcon.php';
?>


<!DOCTYPE html>
<html>
<head>
<title>Yureka</title>
<link rel="shortcut icon" type="image" href="images/mahadasara logo.jpg">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description" content="" />
    <meta name="author" content=""/>
</head>
<body >
<div>
<?php
include('loginheader.php');
?>
           </div>

    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
    <legend align="center">LOGIN</legend>

<div class="form-group">

  <label class="col-md-4 control-label" for="Email">Email Id</label>  
  <div class="col-md-2">
  <input id="email" name="email" type="email" placeholder="Type Registered Email Id" class="form-control input-md" required="">
  <span class="help-block">Type your Registered Email-id</span>  
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-2">
    <input id="password" name="password" type="password" placeholder="Type Password" class="form-control input-md" required="">
    <span class="help-block">Use Registered Password</span>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
<div class="col-md-8">
    <button id="login" name="login" class="btn btn-primary">Login</button>
    <br>
    
    <!--<button id="forgotpassword" name="forgotpassword" class="btn btn-warning">Forgot Password</button>-->
  </div>
</div>


    </fieldset> 
       
  
</form>

   <!-- <h2 style="text-align:center;">Under Maintenance Try after One Hour</h2>-->
   
<?php
if(isset($_POST['login']))
{
    //session_start();
    //echo "login part";
     include 'dbcon.php';
   // echo "You Clicked on login";
    //$ct=0;

    $flag=0;

    //code for login
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    //admin login
    if($flag==0)
    {
 $sql = "select admin_id,email from admin where email='$email' and password='$password'";
// echo $sql;
  
 $query = mysqli_query($con,$sql);

 if(mysqli_num_rows($query)==1)
 {
    $r = mysqli_fetch_array($query);
    $adminid=$r['adminid'];
    $email=$r['email'];
  
        $_SESSION['uid'] = $email;
        $_SESSION['utype']="admin";
        //$_SESSION['loggedin'] = true;
        //header('location:Admin_Home.php');
        $flag=1;
  echo "<script>window.location.replace('about.php')</script>";
     
    }

    else{
    //event coordinator login
    //else if ($flag==0) {
        //$sql = "SELECT count(*) as ct from user_reg where email_id='$name' and password='$password' ";
        
        $sql = "select event_cid,email from event_coordinator where email='$email' and password='$password'";
   // echo $sql;
        $query = mysqli_query($con,$sql);
if(mysqli_num_rows($query)==1)
 {
            
    $r = mysqli_fetch_array($query);
    $event_cid=$r['event_cid'];
     $email=$r['email'];
   
       $_SESSION['uid'] = $email;
        $_SESSION['utype']="ec";
        //$_SESSION['loggedin'] = true;
          $flag=1;
        //header('location:Admin_Home.php');
        echo "<script>window.location.replace('ec_about.php')</script>";
    }
    else{
    
    //event student login
    //else if ($flag==0) {
      //  echo "student part";
        //$sql = "SELECT count(*) as ct from user_reg where email_id='$name' and password='$password' ";
        
        $sql = "select * from student where email='$email' and password='$password'";
    //echo $sql;
        $query = mysqli_query($con,$sql);
  if(mysqli_num_rows($query)==1)
  {
      $row=mysqli_fetch_array($query);
      $Reg_no=$row['Reg_no'];
      $email=$row['email'];
    //$ct=$r[0];
   $_SESSION['Reg_no']=$Reg_no;
       $_SESSION['uid'] = $email;
        $_SESSION['utype'] = "student";
       // $_SESSION['uid']=$uid;
       // $_SESSION['loggedin'] = true;
          $flag=1;
        //echo "<script>alert('Valid student login')</script>";
        //header('location:Admin_Home.php');
     echo "<script>window.location.replace('studentabout.php')</script>";
    
    }//end else if($ct==0)//student
    
    else {
        //echo "Invalid Login";
         echo("<script>alert(\"Invalid Username and Password...\n\n Please Try Again\")</script>");
    }
    }//end else(stduent)
    }//end else(eventco)

    }//end if(admin)

  
    
 
    
    
    
    
}//end if(isset($_POST['login']))

if(isset($_POST['forgotpassword']))
{
    
}



?>
        
    
    
    
    
    
    </body>
</html>
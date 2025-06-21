
      <?php
      //session_start();
include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>yureka</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description" content="" />
    <meta name="author" content=""/>
    <script>
    function check_usn(str)
        {
            //ajax call to retrievents.php
            alert("usn=>"+str);
            
//            
             x = new XMLHttpRequest();
                    x.open("POST", "check_usn.php?d=" + str, true);
                    x.send();
                    x.onreadystatechange = function ()
                    {
                        if (x.readyState == 4 && x.status == 200)
                        {
                            document.getElementById("usn_info").innerHTML = x.responseText;
                        }
                    };
            
        }
       
        
        </script>
    
    
</head>
<body style="background-color:white">
<?php
include('adminpage.php');
?>
<?php
session_start();
//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" )))
if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="admin" ))
{
     echo "<script>window.location.replace('index.php')</script>";
}
else
{
   
    ?>
   

    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">


<!-- Form Name -->
<!--<legend>Register</legend>-->
 <legend align="center" >Event Co-ordinator Registration</legend>
<!-- Text input-->
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="usn">USN</label>  
  <div class="col-md-4">
      <input id="usn" name="usn" type="text" placeholder="USN" cusn_infolass="form-control input-md" required="" >
  <span class="help-block" id="usn_info">Type Your USN</span>  
  </div>
</div>-->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Full Name" class="form-control input-md" required="">
  <span class="help-block">Type your Full Name</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email Id</label>  
  <div class="col-md-4">
      <input id="email" name="email" type="email" placeholder="Email Id" class="form-control input-md" required="">
  <span class="help-block">Type valid Email Id</span>  
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone No</label>  
  <div class="col-md-4">
      <input id="phone" name="phone" type="number" placeholder="Mobile No" class="form-control input-md" required="">
  <span class="help-block">Type valid Mobile No</span>  
  </div>
</div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Create your Password" class="form-control input-md" required="">
    <span class="help-block">Use at least 5 characters </span>
  </div>
</div>





<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="register"></label>
  <div class="col-md-8">
    <button id="register" name="register" class="btn btn-primary">Add Event Co-ordinator</button>
    <button id="clear" name="clear" class="btn btn-danger"  type="reset">Clear</button>
  </div>
</div>


</form>


    
    
    
    
    
    
    </body>
</html>

<?php

}//end else
?>

<?php

if(isset($_POST['register']))
{
    include 'dbcon.php';
    $email=$_POST['email'];
    
  
    $sql = "select * from event_coordinator where email='$email'";
     
       // echo $sql;
        
    $result = mysqli_query($con,$sql);
    $no_of_rows=mysqli_num_rows($result);
    
    if($no_of_rows>0)
    {
        echo("<script>alert(\"You have already Registered/Added...\")</script>");
    }
    else{
    
    
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];

    
    
    
    
    
    
        
        $sql = "insert into event_coordinator(Coname,email,password,phoneno) values('$name','$email','$password','$phone')";
     
       // echo $sql;
        
    $result = mysqli_query($con,$sql);
if($result)
{
  echo("<script>alert(\"You have Succesfully Registered Event Co-ordinator...\")</script>");
   // echo "<b>You have Succesfully Registered, Login Register For Events (Sports/Cultural) <b>";
}
else{
     echo("<script>alert(\"Registration Failed...\n\n Try Again\")</script>");
}
        
    }//end else      
        
        
    
}//end if(isset($_POST['register']))


?>
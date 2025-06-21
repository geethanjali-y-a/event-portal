<?php

include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Yureak</title>
<link rel="shortcut icon" type="image" href="images/mahadasara logo.jpg">
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
    <body style="background-color:#ADD8E6;"> 
<?php
include('reghome.php');
?>

   

    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">


<!-- Form Name -->
<!--<legend>Register</legend>-->
 <legend align="center" style=" color: #FF5733"><b>STUDENT LOGIN REGISTRATION</b></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Reg_no">Reg_no</label>  
  <div class="col-md-4">
      <input id="Reg_no" name="Reg_no" type="text" placeholder="Register number" class="form-control input-md" required="" >
  <span class="help-block">Type Your Valid  College Reg_no</span>  
  </div>
</div>

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

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Gender</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="gender" id="gender" value="Male" checked="checked" required="">
      Male
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="gender" id="gender" value="Female" required="">
      Female
    </label>
	</div>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cource">Cource</label>  
  <div class="col-md-4">
      <input id="cource" name="cource" type="text" placeholder="Cource" class="form-control input-md" required="">
  <span class="help-block">Type valid Cource</span>  
  </div>
</div>

</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sem">Select Semester</label>
  <div class="col-md-4">
    <select id="sem" name="sem" class="form-control" required="">
      
      <option value="2">2</option>
      <option value="4">4</option>
      <option value="6">6</option>
      <option value="8">8</option>
    </select>
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="college">College</label>  
  <div class="col-md-4">
      <input id="college" name="college" type="text" placeholder="College" class="form-control input-md" required="">
  <span class="help-block">Type valid college Name</span>  
    </div>
    </div>


<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Create your Password" class="form-control input-md" required="">
    <span class="help-block">Use at least 5 characters<br><p style="color:blue;">*Remember password for future login</p></span>
  </div>
</div>


<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_upload">Upload your Photo</label>
  <div class="col-md-4">
    <input id="fileToUpload" name="fileToUpload" class="input-file" type="file" required="">
    <p style="color:red;">*max file_size 100kb and same photo will be used for certification purpose</p>
  </div>
</div>








<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="register"></label>
  <div class="col-md-8">
    <button id="register" name="register" class="btn btn-primary">Register</button>
    <button id="clear" name="clear" class="btn btn-danger"  type="reset">Clear</button>
  </div>
</div>


</form>  
    
</body>
</html>



<?php

if(isset($_POST['register']))
{
    include 'dbcon.php';
    $Reg_no=$_POST['Reg_no'];  
    $email=$_POST['email'];

    
  
    $sql = "select * from student where Reg_no='$Reg_no'|| email='$email'";
     
       // echo $sql;
        
    $result = mysqli_query($con,$sql);
    $no_of_rows=mysqli_num_rows($result);
    
    if($no_of_rows>0)
    {
        echo("<script>alert(\"You have already Registered...\")</script>");
    }
    else{
    
    
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $cource=$_POST['cource'];
    $sem=$_POST['sem'];
    $college=$_POST['college'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
  //  $file_name=$_POST['file_upload'];
    
    
    
    
    
    
    
   $target_dir = "student_photos/";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   
   $newfilename=$target_dir;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$date = new DateTime();
$newfilename.= $date->getTimestamp();
            $random=rand(10,1000);
            $newfilename=$newfilename."".$random.".".$imageFileType;


// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
//}
// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {
     //   echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
        //Logic for data insertion
        $sql = "insert into student(Reg_no,name,email,gender,password,cource,photo,sem,college,phone) values('$Reg_no','$name','$email','$gender','$password','$cource','$newfilename','$sem','$college','$phone')";
       

     
       //echo $sql;
        
    $result = mysqli_query($con,$sql);
if($result)
{
  echo '<script>alert("Register Successfull Remember Password and Username \\n Your Username: "+"'.$email.'"+"\\n Your Password: "+"'.$password.'")</script>';
  echo "<script>window.location.replace('login.php')</script>";
   // echo "<b>You have Succesfully Registered, Login Register For Events (Sports/Cultural) <b>";
}
else{
     echo("<script>alert(\"Registration Failed...\n\n Try Again\")</script>");
}
        
        
        
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    } //end else
    
    
    
    
    
    
    
    
    
    
    
    
}//end if(isset($_POST['register']))


?>
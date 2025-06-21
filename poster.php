<?php

session_start();
 include 'dbcon.php';
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
include('ec_home_page.php');

if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="ec"))
{
     echo "<script>window.location.replace('login.php')</script>";
}

else{
    ?>


   

    <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

<!-- Form Name -->
<!--<legend>Register</legend>-->
<legend align="center" style=" color: #FF5733">Upload events photos</legend>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_upload">Upload your Photo</label>
  <div class="col-md-4">
    <input id="fileToUpload" name="fileToUpload" class="input-file" type="file" required="">
 
  </div>
</div>








<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="register"></label>
  <div class="col-md-8">
    <button id="register" name="register" class="btn btn-primary">Upload</button>
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
   
    
    
  
  //  $file_name=$_POST['file_upload'];
    
    
    
    
    
    
    
   $target_dir = "poster_photos/";
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
if ($_FILES["fileToUpload"]["size"] > 1000000) {
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
        $sql = "insert into poster(photo) values('$newfilename')";
       

     
       //echo $sql;
        
    $result = mysqli_query($con,$sql);
if($result)
{
 echo '<script>alert("uploaded")</script>';
  echo "<script>window.location.replace('poster.php')</script>";
   // echo "<b>You have Succesfully Registered, Login Register For Events (Sports/Cultural) <b>";
}
else{
     echo("<script>alert(\"Failed...\n\n Try Again\")</script>");
}
        
        
        
        
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    } //end else
    
    
    
    
    
    
    
    
    
}  
    

?>
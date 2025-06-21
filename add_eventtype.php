
      <?php

 include 'dbcon.php';
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
</head>
<body>
<?php
include('adminpage.php');
?>
<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data"  >
<fieldset>

<!-- Form Name -->
<center><legend>Add Event Type</legend></center><br/>
      <?php
session_start();
//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" )))
if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="admin"))
{
     echo "<script>window.location.replace('index.php')</script>";
}
else
{
   
    ?>

 
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="event_type">Event Type Name</label>  
  <div class="col-md-4">
  <input id="event_type" name="event_type" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block">Event Type Name (Like Sports, Cultural)</span>  
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="event_size">Event Type</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="event_size-0">
      <input type="radio" name="event_size" id="event_size-0" value="Individual" checked="checked">
      Individual
    </label>
	</div>
  <div class="radio">
    <label for="event_size-1">
      <input type="radio" name="event_size" id="event_size-1" value="Group">
      Group
    </label>
	</div>
</div>
</div>
      




<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="add"></label>
  <div class="col-md-8">
    <button id="add" name="add" class="btn btn-success">Add Event Type</button>
    <button id="clear" name="clear" class="btn btn-danger" type="reset">Clear</button>
  </div>
</div>
 
      <?php  
}//end else
    
    
    ?>
</fieldset>
</form>

    
    
    
    
   
    
    
    </body>
</html>

<?php

if(isset($_POST['event_type']))
{
     include 'dbcon.php';
  
   
    //code for adding event_type
    
    $event_type=$_POST['event_type'];
    $team_type=$_POST['event_size'];
        
    
    $event_type_name=$event_type."(".$team_type.")";
    $sql = "insert into event_type(event_type_name) values('$event_type_name')";
     
       // echo $sql;
        
    $result = mysqli_query($con,$sql);
if($result)
{
  echo("<script>alert(\"Event Type Added Succesfully \")</script>");
   // echo "<b>You have Succesfully Registered, Login Register For Events (Sports/Cultural) <b>";
}
else{
     echo("<script>alert(\" Problem in Adding Event Type\")</script>");
}
        
    
    
    
}//end if()




?>
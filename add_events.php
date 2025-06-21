
      <?php
session_start();
 include 'dbcon.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>Yureka</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description" content="" />
    <meta name="author" content=""/>
</head>
<body style="background-color:white">
<?php
include('adminpage.php');
?>

<form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>"   >

<?php
//session_start();
//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" )))
if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="admin"))
{
     echo "<script>window.location.replace('index.php')</script>";
}
else
{
   
    ?>
<!-- Form Name -->
<center><legend>Add Events</legend></center>
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="ename">Event Name</label>  
  <div class="col-md-4">
  <input id="ename" name="ename" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block">Event Name (Like Cricket,Chess,Essay writing etc)</span>  
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="event_type">Select Event Type</label>
  <div class="col-md-4">
    <select id="event_type" name="event_type" class="form-control">
      <option value="">Select Event Type</option>
       <?php

//code for retrieving event types


 $sql = "select event_type_id,event_type_name from event_type";
     
    $result = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_array($result)) {

    $event_type_id=$rows[0];
    $event_type_name=$rows[1];
    
?>
       <option value="<?php echo $event_type_id ?>"><?php echo $event_type_name ?></option>
       
            <?php
} //end while($rows = mysql_fetch_array($result))
      ?> 
    </select>
  </div>
</div>
<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="c1[]">Event for</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="c1[]-0">
      <input type="checkbox" name="c1[]" id="c1[]" value="Male">
      Male
    </label>
	</div>
  <div class="checkbox">
    <label for="c1[]-1">
      <input type="checkbox" name="c1[]" id="c1[]" value="Female">
      Female
    </label>
	</div>
  </div>
</div>




      <?php  
}//end else
    
    
    ?>
    
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="event_coordinator">Select Event Coordinator</label>
  <div class="col-md-4">
    <select id="event_coordinator" name="event_coordinator" class="form-control">
    <option value="">Select Event Coordinator</option>    
         <?php

//code for retrieving event coordinators


 $sql = "select event_cid,Coname from event_coordinator";
     
    $result = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_array($result)) {

    $event_cid=$rows['event_cid'];
    $Coname=$rows['Coname'];
 
?>
      <option value="<?php echo $event_cid ?>"><?php echo $Coname ?></option>
            <?php
}// end while($rows = mysql_fetch_array($result))
      ?>     
    </select>
  </div>
</div>


     <!-- Button (Double) -->
     <div class="form-group">
  <label class="col-md-4 control-label" for="add"></label>
  <div class="col-md-8">
    <button id="add" name="add" class="btn btn-success">Add Event</button>
    <button id="clear" name="clear" class="btn btn-danger" type="reset">Clear</button>
  </div>
</div>


</form> 
    </body>

</html>
<?php

if(isset($_POST['add']))
{
     include 'dbcon.php';
  
   
    //code for adding event
    $ename=$_POST['ename'];
    $event_typeid=$_POST['event_type'];  
 
      $event_cid=$_POST['event_coordinator'];
        $gender=$_POST['c1']; //checkbox array
        
        $gender_value="";
        $x=1;
        foreach($gender as $v)
        {
            if($x>1)
            {
            $gender_value.=" and ".$v;
            }
            else{
                $gender_value=$v;
            }
            $x++;
            
        }
     //   $gender_value=$v;
        
        $sql="";
        
         
    
        $sql = "insert into events(ename,event_cid,event_type_id,gender) values('$ename','$event_cid','$event_typeid','$gender_value')";
     
       //echo $sql;
        
    $result = mysqli_query($con,$sql);
if($result)
{
  echo("<script>alert(\"Event Added Succesfully \")</script>");
   // echo "<b>You have Succesfully Registered, Login Register For Events (Sports/Cultural) <b>";
}
else{
     echo("<script>alert(\" Problem in Adding Event\")</script>");
}
        
    
    
    
}//end if()




?>


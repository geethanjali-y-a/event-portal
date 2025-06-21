<!DOCTYPE html>
<html lang="en">
<head>
  <title>yureka</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


<?php
session_start();
include 'dbcon.php';
$event_type_id=$_REQUEST['d'];
//echo $event_type_id;

$email=$_SESSION['uid'];
$Reg_no=$_SESSION['Reg_no'];


//If No Events are Registered for an Event Type Than Skip further Process
$query2 = "select count(eventid) as ct from events where event_type_id='$event_type_id'";

$result=mysqli_query($con,$query2);
$rows=mysqli_fetch_array($result);
 $ct=$rows['ct'];
 if($ct==0)
 {
      echo " &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
     echo "<span style=color:#ff0000;text-align:center;>No Events available Under this Event Type...</style>";
 }
 else{

//Logic for Retrieving gender and displaying applicable events
$sql = "select gender from student where Reg_no='$Reg_no'";
    //echo $sql;
     
    $result = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_array($result)) {
    $gender=$rows[0];
} //end while()
if($gender=="Male")
{
    $sql2="select e.eventid,e.ename,ec.name as event_coname,b.bname,e.gender from events e,event_coordinator ec,branch b where e.event_cid=ec.event_cid and e.event_type_id='$event_type_id' and (e.gender='Male' || e.gender='Male and Female') and ec.branchid=b.branchid";
//$sql2 = "select e.eventid,e.ename,ec.name as event_coname,ec.bname from events e,event_coordinator ec where e.event_cid=ec.event_cid and e.event_type_id='$event_type_id' and (e.gender='Male' || e.gender='Male and Female')";
//echo "Male-".$sql2;
}
else if($gender=="Female")
{
    $sql2="select e.eventid,e.ename,ec.name as event_coname,b.bname,e.gender from events e,event_coordinator ec,branch b where e.event_cid=ec.event_cid and e.event_type_id='$event_type_id' and (e.gender='Female' || e.gender='Male and Female') and ec.branchid=b.branchid";
    //$sql2 = "select e.eventid,e.ename,ec.name as event_coname,ec.bname from events e,event_coordinator ec where e.event_cid=ec.event_cid and e.event_type_id='$event_type_id' and (e.gender='Female' || e.gender='Male and Female')";
    //echo "Female-".$sql2;
}


//Logic for Finding already Registered Events for Checking CheckBoxes
$query = "select eventid from participant where Reg_no='$Reg_no'";
   // echo $sql;
    
$choosen_list = array();
  $k=0;
    $result = mysqli_query($con,$query);
  
while ($rows = mysqli_fetch_array($result)) {
    $choosen_list[$k]=$rows[0];
    $k++;
} //end while()

//print_r($choosen_list);










?>
<div class="container">
  <h2>Choose Events </h2>
<!--  <p>The .table-hover class enables a hover state on table rows:</p>            -->
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Event Name</th>
    <th>Select Event</th>
      </tr>
    </thead>
    <tbody>
   
    
    <?php
    
 
    //$sql2 = "select e.eventid,e.ename,ec.name as event_coname,ec.branchname from events e,event_coordinator ec where e.event_cid=ec.event_cid and e.event_type_id='$event_type_id'";
    $sql2="select eventid,ename   from events  where event_type_id='$event_type_id'";
   // $sql1="select event_id,ename,name ,from events ,event_coordinator ,where event_type_id='$event_type_id'";
   // echo $sql2;
     
    $result = mysqli_query($con,$sql2);
while ($rows = mysqli_fetch_array($result)) {
    $eventid=$rows[0];
    $ename=$rows[1];
   
    
   
    //logic for checking event already registered or not to check checkbox
    $flag=0;
    
    for($i=0;$i<sizeof($choosen_list) && $flag==0;$i++)
    {
    if($choosen_list[$i]==$eventid)
    {
        $flag=1;
        break;
    }
    }//end foreach()
    
    echo "<tr><td>".$ename."</td>";
    if($flag==1)
    {
       echo "<td><input type='checkbox' name='c1[]' value='$eventid' checked /></td></tr>";
    }
    else{
         echo "<td><input type='checkbox' name='c1[]' value='$eventid'/></td></tr>"; 
    }
    
}//end while()
    
    ?>
  </tbody>
  </table>
</div>

    <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="save"></label>
  <div class="col-md-4">
    <button id="save" name="save" class="btn btn-primary">Save</button>
  </div>
</div>
    
    
    <?php
 }//end else
    ?>
</body>
</html>

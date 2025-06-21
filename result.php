<?php
include 'dbcon.php';
session_start();
if (isset($_POST['result']))
    {
   $win=$_POST['win'];  
   $run=$_POST['run'];
   if(is_null($win))
   {
       echo '<script>alert("Winner not Selected")</script>';
   }
   elseif(is_null($run))
   {
       echo '<script>alert("Runner not Selected")</script>';
   }
   elseif($run==$win) 
   {
       echo '<script>alert("Winner and Runner Should not be same")</script>';
   }
   else {

        
         $email=$_SESSION['uid'];
    $sql = "select eventid from v3 where email='$email'";
    
    $result = mysqli_query($con,$sql);
    $rows = mysqli_fetch_array($result);
    $eventid=$rows['eventid'];
   
         $sql = "UPDATE `events` SET `winner_Regno`='$win',`runner_Regno`='$run' WHERE eventid=$eventid";
    
         $a=mysqli_query($con,$sql);
         if($a)
         {
               echo '<script>alert("Data Saved.....")</script>';
         }
 
   
   }
   echo "<script>window.location.replace('Win_run_res.php')</script>";
}
   ?>

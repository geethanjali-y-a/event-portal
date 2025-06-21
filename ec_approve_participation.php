<?php


if (isset($_POST['approve'])) {
session_start();
    
    include 'dbcon.php';
    
     $email=$_SESSION['uid'];
     echo $email;
    $sql = "select eventid,ename from v3 where email='$email'";
    
    $result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result);
$eventid=$rows['eventid'];
$ename=$rows['ename'];
echo $eventid." ".$ename;

//Reset status to 1 //Not participated
$sql="select Reg_no,eventid from v3 where eventid='$eventid' and status=1";
       echo $sql;
        $query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query))
        {
        $Reg_no=$row['Reg_no'];
       // $eventid=$row['eventid'];
        $sql1 = "update participant set status=1 where Reg_no='$Reg_no' and eventid='$eventid' and status=0";
        echo $sql;
        $query1 = mysqli_query($con,$sql1);
        }
    
    //update checked event status
    if(isset($_POST['c1']))
    {
        
    //
    //if($_POST['c1']=="0" && $sid!="")
    
     
    $Reg_no_list=$_POST['c1'];  
    
   // print_r($selected_event_list);
        
        foreach($Reg_no_list as $Reg_no)
        {
             $sql2 = "update participant set status=1 where Reg_no='$Reg_no' and eventid='$eventid'";
         //$sql = "insert into participant(sid,eventid) values('$sid','$eventid')";
           $result = mysqli_query($con,$sql2);
            
        }//end foreach()
        
        echo("<script>alert(\"You have Successfuly Approved students participation for the event... \")</script>");
echo "<script>window.location.replace('app_paticipants.php')</script>";
    }//end if(isset($_POST['c1]))
    else{
        echo("<script>alert(\"You have Successfuly Approved students participation for the event... \")</script>");
 echo "<script>window.location.replace('app_paticipants.php')</script>";
    }
    
//                    <!--                  
//                </div>
 }//$_POST['view']
                                ?> 
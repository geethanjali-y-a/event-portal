<?php
session_start();
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
    
    
    
    
    <script type="text/javascript">
        
        function call_events(str)
        {
            //ajax call to retrievents.php
            //alert("selected eventid=>"+str);
            
            
             x = new XMLHttpRequest();
                    x.open("POST", "retrieve_events.php?d=" + str, true);
                    x.send();
                    x.onreadystatechange = function ()
                    {
                        if (x.readyState == 4 && x.status == 200)
                        {
                            document.getElementById("display_events").innerHTML = x.responseText;
                        }
                    };
            
        }//end function call_events(str)()
        
        
         function call_logout()
            {
             //   alert("view events");
                window.location.replace('logout.php'); 
        //  window.location.href='view_participants.php'; 
            
            
            }//end call_logout()
            
        
        
        
        </script>
    
    
    
   <style>
       table, th, td {
  border:1px solid black;text-align: left;
}
   </style> 
    
    
    
    
</head>
<body style="background-color:#ADD8E6;">
<!-- <div>
            <image src="images/mainheader.jpeg" width="100%"/>
        </div>-->
<!--<div class="wrapper single-blog">-->
<div>
  <?php 
 include("student_header.php");
  ?>
</div>

<?php


//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" ) && isset($_SESSION['email']) && isset($_SESSION['usn']) ))
if (!isset($_SESSION['uid']) && !($_SESSION['utype']=="student"))
{
  //  echo "student home saild invalid";
  //echo "<script>window.location.replace('index.php')</script>";
}
else
{
  //include 'common_header.php';
     
    ?>
     <legend style=" color: #FF5733" align="left"><?php echo "<b> Welcome User: ".$_SESSION['uid']."</b>";?></legend>
    <form class="form-horizontal" method="post" action="<?php  $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->
<legend align='center'>Register for Events</legend>
<center><table class="borderd">
    
     </center>
     
 </table><br><br>
<!--<button id="logout" name="logout" type='button' class="btn btn-success" align='right' onclick="call_logout()">Logout</button>-->
<!-- Select Basic -->

<div class="form-group">
  <label class="col-md-4 control-label" for="event_type">Select Event Type</label>
  <div class="col-md-4">
      <select id="event_type" name="event_type" class="form-control" onchange="call_events(this.value)">
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

<div id="display_events"> </div>
    
    




<!-- Button -->
<!--<div class="form-group"> 
  <label class="col-md-4 control-label" for="save"></label>
  <div class="col-md-4">
    <button id="save" name="save" class="btn btn-primary">Save</button>
  </div>
</div>-->

</fieldset>
</form>
    
 
<?php
    
}//end else
  ?>  
    </body>
</html>


<?php
if(isset($_POST['save']))
{
    //session_start();
    include 'dbcon.php';
    
    //code for adding event
   // $sid=$_SESSION['uid'];
    $Reg_no=$_SESSION['Reg_no'];
    $event_type_id=$_POST['event_type'];
    
      //$selected_event_list=$_POST['c1'];
  // echo "sid=".$sid;
    if($Reg_no)
    {
       // echo " deleted";
        
       // $sql="delete from participant p where p.sid='$sid' and p.eventid in (select e.eventid from events e where e.event_type_id='$event_type_id')";
        //echo $sql;
       

     
        
        
        $sql = "select eventid from events where event_type_id='$event_type_id'";
        
       // echo $sql;
    //echo $sql;
        $query = mysqli_query($con,$sql);
   while( $r = mysqli_fetch_array($query))
   {
       $id=$r[0];
       //for Individual events (status=1 than delete, if status=2 than do not delete)
       if($event_type_id==1 || $event_type_id==3)
        {
       
       $query3="delete from participant  where eventid='$id' and Reg_no='$Reg_no' and status='1'";
       // echo $query3;
       $s=mysqli_query($con,$query3);
        }
         //for Group events (status=0 than delete, if status=1 or 2 than do not delete)
       if($event_type_id==2 || $event_type_id==4)
        {
       
       $query3="delete from participant  where eventid='$id' and Reg_no='$Reg_no' and status='1'";
       // echo $query3;
       $s=mysqli_query($con,$query3);
        }
       
   }//end while()
        
        
        
        
        
        
        
        
    
    }
   
    
    if(isset($_POST['c1']))
    {
    //
    //if($_POST['c1']=="0" && $sid!="")
    
     
    $selected_event_list=$_POST['c1'];  
    
   // print_r($selected_event_list);
        
        foreach($selected_event_list as $eventid)
        {
     //For Individul events
           if($event_type_id==1 || $event_type_id==3)
           {
         $sql = "insert into participant(Reg_no,eventid,status) values('$Reg_no','$eventid','0')";
           $result = mysqli_query($con,$sql);
           }
           if($event_type_id==2 || $event_type_id==4)
           {
         $sql = "insert into participant(Reg_no,eventid,status) values('$Reg_no','$eventid','0')";
           $result = mysqli_query($con,$sql);
           }
           
        }//end foreach()
        
        echo("<script>alert(\"You have Successfuly Registered for selected Events... \")</script>");

    }//end if(isset($_POST['c1]))
    
//    else{
//        echo "UNCHECKED CHECK BOXES";
//        
//        
//        if($sid!="" )
//    {
//        echo "no events selected or unchecked all selcted events";
//        
//        $sql="delete from participant where sid='$sid' and eventid in(select eventid from event where evenet_type_id='$event_type_id')";
//       
//     
//    $result = mysql_query($sql);
//    }
//        
//   
//     
//    }//end else
    


    
    
}//end if(isset($_POST['save']))

?>

      <?php
session_start();
 include 'dbcon.php';

?>
<!DOCTYPE html>
<html>
<head>
    <style>
/*body {
  background-image: url('images/fest2.webp');
  width: 100%;
  height: 100%;
}*/
</style>

  <script>
function print_current_page()
{
window.print();
}
    </script>

<title>Yureka</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description" content="" />
    <meta name="author" content=""/>
    
    
    
</head>
<body style="background-color:#ADD8E6;">
    <div>
  <?php 
 include("student_header.php");
  ?>
        
</div>
<legend style=" color: #FF5733" align='center'><b>Student portal </b>  </legend>
    <div>
<!--            <image src="images/mainheader.jpeg" width="100%"/>
        </div>
    <center><h2 style=" background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%); color:white;height:50px;padding-top:6px">Student Registration Card</h2></center>-->
   
        
        <div>
<!--<div>
            <img src="images/2022logo.jpeg" width="100%" style="max-height: 200px;">
        </div>-->


<?php 

if (!(isset($_SESSION['uid'])) && !($_SESSION['utype']=="student" ))
{
     //echo "<script>window.location.replace('index.php')</script>";
}
else
{
     
   
    include 'dbcon.php';
    //p1
    $email=$_SESSION['uid'];
    $Reg_no=$_SESSION['Reg_no'];
    
    $sql1="select Reg_no,name,sem,photo,college from student where Reg_no='$Reg_no'";
    //echo $sql1;
     $query=mysqli_query($con,$sql1);
    $r=mysqli_fetch_array($query);
    $name=$r['name'];
    $sem=$r['sem'];
    $college=$r['college'];
    ?>
<table border='0' align='center'>
    <tr>
    <?php
    echo "<td><b>Reg_no:".$Reg_no."<b><br><br>";
    echo "<b>Name:".$name."<b><br><br>";
    echo "<b>college:".$college."<b><br><br></td>";
   
  
    ?>
        <td>&nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;<img src="<?php  echo $r['photo']?>" width="140" height="150"></td></tr></table><br><br>
    <?php
   // echo "<b>Branch:".$bname."<b><br>";
    
     //$sql="select ename,gender,name,bname,email,phoneno from v7 where event_type_id='$event_type_id'";
                                //$sql="select bid,name1,file1,place1,name2,file2,place2,phoneno1,phoneno2 from biathlon where email1='$email' || email2='$email'";
                              $sql2="select Reg_no,eventid,name,ename,status,event_type_name from v2 where Reg_no='$Reg_no'";
                           // echo $sql2;
                                $query=mysqli_query($con,$sql2);
                                $no_of_rows=mysqli_num_rows($query);
                                if($no_of_rows>0)
                                {
                               // echo "<tr><td>".$query."</td></tr>";
                              //$slno=1;
                                    
                              
                                
    
?>

           
                            <!--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
<div class="container"
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
        <table align='center' class="table table-bordered"  width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <!--<th>Team-Id</th>-->
                                    <th>Event Type Name</th>
                                    <th>Event Name</th>
                                     <th>Status</th>
                                     <th>certificate</th> 

<!--                                     <th>Photo</th>                                      
                                    <th>Participant-2</th>
                                    <th>Contact Info</th>                                 -->
                                    <!--<th>Place</th>-->
                                    <!--<th>contactno</th>-->

                                </tr>
                                </thead>
                               
                                <tbody>
                                <?php
                               while($r=mysqli_fetch_array($query))
                                {
                                  $name=$r['name'];
                               $eventid=$r['ename'];
                               $event_type_name=$r['event_type_name'];
                                $status=$r['status'];
                        
                                
                             
                               
                                    ?>
                                    <tr>
                                      
                                        <td><?php echo  $event_type_name ?> </td>
                                        <td><?php echo $eventid; ?></td>
                                       <?php
                                       if($status=='0')
                                       {
                                         echo "<td> Applied </td>";
                                       }
                                       else if ($status=='1') {

                                        echo "<td> Participated </td>";
                                        echo '<td><p><a href="certificate.php?ename='.$r['ename'].'"" class="btn btn-warning"> certificate </a></p></td></tr>';
                                            }
                                      else if ($status=='2') {
                                        echo "<td> winner/runner </td>";
                                        echo '<td><p><certificate.php?ename='.$r['ename'].'"" class="btn btn-info">  W_certificate </a></p></td></tr>';
                                            }
                                        
                                       echo "</tr>";
                               
                                }//end while()
                                ?>
                                       
                                      
                                       
                              
                            </tbody>
                                 
                            </table>
     <div class="col-md-2"></div>
        </div>
        </div>
<div class="form-group" align='center'>
  <!--<label class="col-md-4 control-label" for="submit"></label>-->
  <div class="col-md-12" align='center' >
     <!-- <button id="submit" name="View" class="btn btn-primary" onclick="print_current_page()">Print</button><br><h4></h4>
    <!--<button id="rules" name="rules" class="btn btn-primary" onclick="fun()">Rules</button>-->
  </div>
</div>  
                  
<?php

 }//end if
 else{
     ?>
 
     <legend style=" color: #FF5733" align='center'><b><?php echo "Sorry, You have not registered for any events...";  ?></b>  </legend>
 <?php
     }//end else
}//end else (session)
     ?>
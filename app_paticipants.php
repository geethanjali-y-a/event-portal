<?php
session_start();
 include 'dbcon.php';

?>
<html>
    <head>
          <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/dashboard.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    </head>
    <body>
        <div>
            <?php include 'ec_home_page.php'; ?>
        </div>
    
        <div>
            

    
    
    
    
    
  
   
    <style>
        .glyphicon-color, .textcolor {
            color: white;
        }
    </style>
    




<!--      <div class="col-md-3" align="left">
        <button id="view" name="view" class="btn btn-warning" onclick="call_home()" >Home</button>
  </div>-->
 <form method="POST" class="form-horizontal" action="ec_approve_participation.php" >
  <?php

//session_start();

//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" )))
if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="ec"))
{
     echo "<script>window.location.replace('login.php')</script>";
}

else{
    

?>
     
 
    
 
    <!-- Select Basic -->
   
    
  
    
 <div class="form-group" align="center">
  
  <div class="col-md-4">

    
       <?php

//code for retrieving event types

 include 'dbcon.php';
 ?>

    <!-- Button -->
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="view"></label>
-->  
<!--<div class="col-md-3" align="right">
    <button id="view" name="view" class="btn btn-primary" >View Participants</button>
  </div>
</div>-->
  </div>
 </div>
    <?php
    include 'dbcon.php';
    
     $email=$_SESSION['uid'];
     ?>
     <legend style=" color: #FF5733"><b>Welcome Event Co-rdinator <?php echo $email?> </b>  </legend>
            <?php
     //echo $email;
    $sql = "select eventid,ename from v3 where email='$email'";
    
    $result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result);
$eventid=$rows['eventid'];
$ename=$rows['ename'];
//echo $eventid." ".$ename;
    
      //$event_type_id=$_POST['event_type'];
                                
     // echo 'sdf'.$ename;                        
    ?>
   
    
  

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 <legend style=" color: #FF5733" align="center"><?php echo "<b>".$ename."</b>";?></legend>
 <center> <h2 style="color:navy;">Event Coordinator has to approve prticipants only after event conduction</h2></center>
    <div class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>&emsp;Student List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Reg_no</th>
                                    <th>Name</th>
                                   <!-- <th>College</th>-->
                                    <th>events</th>
                                    <th>Contact No</th>
                                    <th>Approve Participation</th>
                                    <!--<th>Event Name</th>-->
                                      <!--<th>Event Type</th>-->
                                      <!--<th>Gender</th>-->
                                  


                                </tr>
                                </thead>
                               
                                <tbody>
                                <?php
                                
                              
                                
                        
                                
                             
                                //$sql="SELECT usn,name,email,bname,phone,ename from v6 where event_type_id='$event_type_id'";
                                //echo $sql;
                                 $sql="SELECT Reg_no,name,sem,phone,ename,status from v3 where eventid='$eventid'";
                                $query=mysqli_query($con,$sql);
                                while ($r = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>

                                        <td><?php 
                                        $Reg_no=$r['Reg_no'];
                                        echo $r['Reg_no']; ?></td>
                                        <td><?php echo $r['name']; ?></td>
                                       <!-- <td><?php echo $r['college']; ?></td>-->
                                        <td><?php echo $r['ename']; ?></td>
                                         <td><?php echo $r['phone']; ?></td>
                                         
                                        
                                        <?php $status=$r['status']; 
                                         if($status==0)
                                         {
                                       
                                        echo "<td><input type='checkbox' name='c1[]' value='$Reg_no'  /></td></tr>";
                                     
                                       
                                         }
                                         else if($status==1)
                                         {
                                              echo "<td><input type='checkbox' name='c1[]' value='$Reg_no' checked /></td></tr>";                                         
                                       
                                          }
                                        ?>
<!--                                        <td><?php //echo $r[6]; ?></td>
                                        <td><?php //echo $r[7]; ?></td>-->
                                    </tr>
                                <?php
                                }//end while()
                                ?>
                                </tbody>
                                 
                            </table>
                        </div>
                    </div>
    
    
             <br><br>
            </div>
        </div>
    </div>
    </div>
    
        <div class="col-md-3" align="right">
    <button id="view" name="approve" class="btn btn-primary" >Approve Participation</button>
  </div>
    
    
 
    
    
</form>
   
           <?php

} //end else



?>








                
       






    
     <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small></small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
   
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="vendor/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="vendor/sb-admin-datatables.min.js"></script>
    
   <?php 
   // echo "<script>window.location.replace('view_events2.php')</script>";
//}//end if(isset($_POST['Submit'))

?>







        </div>
    </body>
</html>
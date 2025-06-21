<?php
session_start();
 include 'dbcon.php';

?>
<html>
    <head>
        <title>yureka</title>
         <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/dashboard.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
           
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
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
    

    </head>
    <body>

        <div>
            <?php include 'ec_home_page.php'; ?>
        </div>
        <form method="POST" class="form-horizontal" action="result.php" >

    <div>
        <?php 
      //  session_start();
        $email=$_SESSION['uid'];
      //  echo 'sdf'.$email;
            include 'dbcon.php';

     //echo $email;
            
          
            
    $sql = "select eventid,ename,event_type_id from v3 where email='$email'";
    $result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result);
$eventtype=$rows['event_type_id'];
$eventid=$rows['eventid'];
$ename=$rows['ename'];
//echo $eventid." ".$ename;
   

   if($eventtype==1||$eventtype==3)
   {
         $sql = "SELECT winner_Regno,runner_Regno FROM `events` WHERE eventid='$eventid'";
    $result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result);
$win_Regno=$rows['winner_Regno'];
$run_Regno=$rows['runner_Regno']; 
       ?>
   
        <legend style=" color: #FF5733" align="center"><?php echo "<b>".$ename."</b>";?></legend>
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
                                    <th>Regno</th>
                                    <th>Name</th>
                                  
                                  
                                   
                                    <th>Winner</th>  
                                    <th>Runner</th>

                                    <!--<th>Event Name</th>-->
                                      <!--<th>Event Type</th>-->
                                      <!--<th>Gender</th>-->
                                  


                                </tr>
                                </thead>
                               
                                <tbody>
                                <?php
                                
                              
                                
                        
                                
                             
                                //$sql="SELECT usn,name,email,bname,phone,ename from v6 where event_type_id='$event_type_id'";
                                //echo $sql;
                                 $sql="SELECT Reg_no,name,phone,status from v3 where eventid='$eventid' and (status=1)";
                                $query=mysqli_query($con,$sql);
                                while ($r = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php 
                                        $Reg_no=$r['Reg_no'];
                                        echo $r['Reg_no']; ?></td>
                                        <td><?php echo $r['name']; ?></td>
                                       
                                        
                                         
                                        
                                        <?php 
                                        
                                        if(!is_null($win_Regno)&&$win_Regno==$Reg_no)
                                        {
                                        echo "<td><input type='radio' name='win' value='$Reg_no' checked /></td>";   
                                        }
                                        else
                                        {
                                        echo "<td><input type='radio' name='win' value='$Reg_no'  /></td>";   
                                        }
                                        
                                        ?>
                                          
                                        <?php 
                                        
                                       if(!is_null($run_Regno)&&$run_Regno==$Reg_no)
                                        {
                                        echo "<td><input type='radio' name='run' value='$Reg_no' checked /></td></tr>";
                                        }
                                        else
                                        {
                                        echo "<td><input type='radio' name='run' value='$Reg_no'/></td></tr>";
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
    <button id="view" name="result" class="btn btn-primary" >Annouce Result</button>
  </div> 
        
        <?php
   
   }
        ?>
    </div>
       </form>
    </body>
</html>

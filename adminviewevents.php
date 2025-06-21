

<!DOCTYPE html>
<html>
<head>
    <script>      
      function call_home()
      {
          //alert(" home()");
           window.location.replace('admin_home.php'); 
    }
     </script>
     <title>Yureka</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 />
              <meta name=" description" content="" />
    <meta name="author" content=""/>
    <style>
        .glyphicon-color, .textcolor {
            color: white;
        }
    </style> 
</head>

<body style="background-color:white">
<?php
include('adminpage.php');
?>
<center><legend>View Events</legend></center><br/><br/>
 <div class="col-md-3" align="left">
     </div>
<form method="POST" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" >
  <?php

session_start();

//if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']=="true" )))
if (!isset($_SESSION['uid'])&&!($_SESSION['utype']=="admin"))
{
     echo "<script>window.location.replace('index.php')</script>";
}

else{
    ?>
<!-- Select Basic -->
    <div class="form-group" align="center">
  
  <div class="col-md-4">

    <select id="event_type" name="event_type" class="form-control">
      <option value="1">Select Event Type</option>
       <?php

//code for retrieving event types

 include 'dbcon.php';
 $sql = "select event_type_id,event_type_name from event_type";
     
    $result = mysqli_query($con,$sql);
while ($rows = mysqli_fetch_array($result)) {

    $event_typeid=$rows[0];
    $event_typename=$rows[1];
    
?>
       <option value="<?php echo $event_typeid ?>"><?php echo $event_typename ?></option>
       
            <?php
} //end while($rows = mysql_fetch_array($result))
      ?> 
    </select>

    <!-- Button -->
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="view"></label>
-->
<br/></br>  
<div class="col-md-12">
   <button id="view" name="view" class="btn btn-primary" >View Events</button>
  </div><!--
</div>-->
  </div>
 </div>
    
    
    <?php

} //end else



?>
    
    
</form>
   

</body>

</html>




<?php
if (isset($_POST['view'])) {

    include 'dbcon.php';
      $event_type_id=$_POST['event_type'];
    //  echo $event_type_id;
     

                                
                                $query = mysqli_query($con,"select * from event_type where event_type_id='$event_type_id'");
                                while ($r = mysqli_fetch_array($query)) {
                                    $event_type_name=$r[1];

                                }//end while();
 ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 <legend style=" color: #FF5733" align="center"><?php echo "<b>".$event_type_name."</b>";?></legend>
    <div class="content-wrapper">
        <div class="container">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>&emsp;Event List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Event Type</th>
                                   
                             


                                </tr>
                                </thead>
                               
                                <tbody>
                                <?php
                                
                              
                                
                        
                                
                             
                                $sql="select ename, event_type_name from v8 where event_type_id='$event_type_id'";
                              
                                $query=mysqli_query($con,$sql);
                               // echo "<tr><td>".$query."</td></tr>";
              
                                while ($r=mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $r[0]; ?></td>
                                        <td><?php echo $r[1]; ?></td>
                                    
                                      
                                    </tr>
                                <?php
                                }//end while()
                                ?>
                                </tbody>
                                 
                            </table>
                        </div>
                    </div>
                    <!--                  
                </div>
 <?php }
                                ?>

                
                <br><br>
            </div>
        </div>
    </div>
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
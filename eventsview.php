
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
    
    
    
    
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/customestyle.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
        .glyphicon-color, .textcolor {
            color: white;
        }
    </style>
    
</head>


<body>
<body >
<?php
include('index header.php');
include 'dbcon.php';
?>

<legend align="center" style=" color: #FF5733">Events</legend>  
<br>






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
                                    <th>event name</th>
                                 
                                      <!--<th>Event Type</th>-->
                                      <!--<th>Gender</th>-->
                                  


                                </tr>
                                </thead>
                               
                                <tbody>
                                <?php
                                
                              
                                
                        
                                
                             
                                $sql="SELECT ename from events";
                                //echo $sql;
                              
                                $query=mysqli_query($con,$sql);
                                while ($r = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $r[0]; ?></td>
                                     
                                        
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
                    <!--                  
                </div>
 <?php 
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






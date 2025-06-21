<!-- -------------PDF GENERATEOR --------------- -->

<button id="pdf-generate">Download</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.223/styles/kendo.common.min.css" />
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jszip.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js"></script>
 
    <div id="example">
    <div class="box wide hidden-on-narrow">
    </div>

    <div class="page-container hidden-on-narrow">
        <div class="pdf-page size-a4">
            <page size="A4">

               <!-- PDF CONTENT START -->

               <h1><image src="images/cerf.jpg" style=" width:100%;
                       height:40%;
                     margin-left:2px;
                       margin-top: -20px;
           margin-bottom: -50px;
                      " ></h1>
                   
             
               <?php
include 'dbcon.php';
session_start();



$ename=$_GET['ename'];  
$email=$_SESSION['uid'];
//echo $email;



$sql = "select name,college from student where email='$email'";
     
        //echo $sql;
        $query = mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($query))
        {
        $name=$row['name'];
        $college=$row['college'];

        }
      
?>

<br>
<br>
<br>

<p>&nbsp;  This is to certify that Mr/Miss   <b><?php echo "$name"; ?> </b>  of <b> <?php  echo "$college" ?> </b>has attended the yureka 2023 organised by yuvaraja’s college during the period 22-03-2023 in the event of  <b> <?php echo"$ename" ?></b>
 
<br>
<br>
<h2><image src="images/header1.jpg" style=" width:100%;
                       height:30%;
                     margin-left:2px;
                       margin-top: -20px;
           margin-bottom: -50px;
                      " ></h1>
<br>
<br>
<br>
<br>

               <!-- PDF CONTENT END -->

            </page>
        </div>
    </div>
    
    <div class="responsive-message"></div>

    <style>
        /*
            Use the DejaVu Sans font for display and embedding in the PDF file.
            The standard PDF fonts have no support for Unicode characters.
        */
        .pdf-page {
            font-family: "DejaVu Sans", "Arial", sans-serif,"Monotype Corsiva";
        }
    </style>

    <script>
        // Import DejaVu Sans font for embedding

        // NOTE: Only required if the Kendo UI stylesheets are loaded
        // from a different origin, e.g. cdn.kendostatic.com
        kendo.pdf.defineFont({
            "DejaVu Sans"             : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
            "DejaVu Sans|Bold"        : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
            "DejaVu Sans|Bold|Italic" : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
            "DejaVu Sans|Italic"      : "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf"
        });
    </script>

    <!-- Load Pako ZLIB library to enable PDF compression -->
    <!-- <script src="../content/shared/js/pako.min.js"></script> -->

    <script>
      function getPDF(selector) {
        kendo.drawing.drawDOM($(selector)).then(function(group){
          kendo.drawing.pdf.saveAs(group, 'certificate.pdf');
        });
      }
    </script>
    <style>
    * {
        box-sizing: border-box;
    }
    body {
          font-family: 'Montserrat', sans-serif;
          font-size: xx-large;
    }
    page[size="A5"] {  
      width: 400px;
      height: 500px; 
    }
    page {
      background:white; 
      display: block;
      margin: 0 auto;
   
    }

</style>

</div>

<script type="text/javascript">
       $('#pdf-generate').click(function(){
         getPDF('.pdf-page');
       })
</script>
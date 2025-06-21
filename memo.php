<!-- -------------PDF GENERATEOR --------------- -->


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
               <h1><image src="images/mainheader2.jpg" style=" width:100%;
                       height:40%;
                     margin-left:2px;
                       margin-top: -20px;
           margin-bottom: -50px;
                      " ></h1>
                   
             
<br>
<br>


                   Two-day YUREKA fest begins ‘YUREKA’, a two-day college fest of Yuvaraja’s College (Autonomous) began at  Auditorium  in Yuvaraja’s College premises this morning. University of Mysore (UoM) acting Vice-Chancellor Prof. Hemanth inaugurated the event. Speaking about the festival and the legacy that has been carried down past many years. This annual science fest of Yuvaraja's College was the brainchild of its 2013 batch  to promote science in a fun way

 

                   <h1><image src="images/FINAL back.jpg" style=" width:100%;
                       height:100%;
              
                      " ></h1>
                   
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

    
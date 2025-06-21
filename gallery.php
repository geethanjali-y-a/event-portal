<?php
include('index header.php');
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="lightbox.min.css">
	<script src="lightbox-plus-jquery.min.js"></script>
	<title>Gallery</title>
	<style>
		.gallery{
			margin: 10px 50px;
		}
		
		.gallery img{
			transition: 1s;
			padding:5px;
			width:350px;
			
		}
		
		.gallery img:hover{
			filter: grayscale(100%);
			transform: scale(1.1);
		}
	</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device_width, intial-scale=1.0">
</head>
<body style="background-color: #ADD8E6;">

    <center>
    <div class="gallery">
        
         <?php

$rdi = new RecursiveDirectoryIterator('poster_photos', FilesystemIterator::SKIP_DOTS);
$rii = new RecursiveIteratorIterator($rdi);




foreach ($rii as $di) {
   $img_name="poster_photos/".$di->getFilename();

   ?>
        <a href="<?php echo $img_name?>" data-lightbox="mygallery"><img src="<?php echo $img_name?>" height="262px"></a>
    	
    	<?php
}


?>
    </center>
   
</body>
</html>
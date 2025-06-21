<?php 
 header('content-type:image/jpeg');
 $font="BRUSHSCI.TTF";
 $image=imagecreatefromjpeg("cerficate.jpg");
 $color=imagecolorallocate($image,19,21,22);
 imagettftext($image,50,0,365,420,$color,$font,$name);
 imagejpeg($image);
 imagedestroy($image);
 
?>
<?php

?>
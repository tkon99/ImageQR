<?php
include('phpqrcode/qrlib.php'); 
$imagedata = file_get_contents('small.jpg');
$original = strlen($imagedata);
$imagedata = urlencode($imagedata);
$encoded = strlen($imagedata);
$tempDir = "tmp/";
QRcode::png($imagedata, $tempDir.'qr.png', QR_ECLEVEL_L); 
?>
<h1>Image QR-Code</h1><br>
<b>Image data:</b><br>
<?php
echo $imagedata;
?>
<hr><b>Image stats:</b><br>
Original lenght:
<?php
echo $original
?><br>
Length safe transfer encoded:
<?php
echo $encoded;
?>
<hr>
<b>Output QR-code</b><br>
<img src="<?php echo($tempDir); ?>qr.png">
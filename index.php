<?php
include('phpqrcode/qrlib.php'); 
$image = 'small.jpg';
$fd = fopen($image, 'rb');
$size= filesize($image);
$imagedata = fread($fd, $size);
$origpicdata = $imagedata;
fclose ($fd);
$original = $size;
$imagedata = base64_encode($imagedata);
$encoded = strlen($imagedata);
$tempDir = "tmp/";
$data = 'data:image/jpeg;base64,';
$data .= $imagedata;
QRcode::png($data, $tempDir.'qr.png', QR_ECLEVEL_L);
?>
<h1>Image QR-Code</h1><br>
<h2>How to: scan qr code --> copy contents & paste as url in browser</h2>
<b>Image data:</b><br>
Original:<br>
<?php echo $origpicdata; ?><br><br>
Encoded (Base64):<br>
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
<b>(Base64 data)Image output</b><br>
<img src="data:image/jpeg;base64,<?php echo($imagedata); ?>">
<hr>
<b>Data QR code</b><br>
<img src="<?php echo($tempDir); ?>qr.png">
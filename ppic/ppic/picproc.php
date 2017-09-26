<!doctype html>
<html lang="en">
<head>
<title>Online Photo Album</title>
<meta charset="utf-8">
<style>
@font-face {
	font-family: 'tron';
	src: url('./tron.eot');
	src: local('tron'), url('./tron.woff') format('woff'), url('./tron.ttf') format('truetype');
}
</style>
</head>
<body>
<?php
session_start();
$con=mysqli_connect("localhost","root","","ppic");
$user=$_SESSION['user'];

$p  = $_FILES['pic_u']['name'];
$a  = $_POST['a'];
$w  = $_POST['w'];
$h  = $_POST['h'];
$t  = uniqid().$p."pic.jpg";
$new= "album/$t";
$rn = rand(0, 65535);


if ($p)
{
    move_uploaded_file($_FILES['pic_u']['tmp_name'], $new);
	$res=mysqli_query($con,"insert into edited(user_name,pic_name,path) values('$user','$p','$new')");

  switch($_FILES['pic_u']['type'])
  {
    case "image/gif":  $s = imagecreatefromgif($new);  break;
    case "image/jpeg": $s = imagecreatefromjpeg($new); break;
    case "image/png":  $s = imagecreatefrompng($new);  break;
  }
  @imagejpeg($s, $new);
}
else $s = @imagecreatefromjpeg($new);

switch($a)
{
  case 1:  @imageconvolution($s, array(array(-1, -1, -1),
             array(-1, 16, -1), array(-1, -1, -1)), 8, 0);       break;
  case 2:  @imagefilter($s, IMG_FILTER_GAUSSIAN_BLUR);           break;
  case 3:  @imagefilter($s, IMG_FILTER_BRIGHTNESS,  20);         break;
  case 4:  @imagefilter($s, IMG_FILTER_BRIGHTNESS, -20);         break;
  case 5:  @imagefilter($s, IMG_FILTER_CONTRAST,   -20);         break;
  case 6:  @imagefilter($s, IMG_FILTER_CONTRAST,    20);         break;
  case 7:  @imagefilter($s, IMG_FILTER_GRAYSCALE);               break;
  case 8:  @imagefilter($s, IMG_FILTER_NEGATE);                  break;
  case 9:  @imagefilter($s, IMG_FILTER_COLORIZE, 128, 0, 0, 50); break;
  case 10: @imagefilter($s, IMG_FILTER_COLORIZE, 0, 128, 0, 50); break;
  case 11: @imagefilter($s, IMG_FILTER_COLORIZE, 0, 0, 128, 50); break;
  case 12: @imagefilter($s, IMG_FILTER_EDGEDETECT);              break;
  case 13: @imagefilter($s, IMG_FILTER_EMBOSS);                  break;
  case 14: @imagefilter($s, IMG_FILTER_MEAN_REMOVAL);            break;
}
  
if ($w)
{
  list($tw, $th) = getimagesize($new);
  $s1            = imagecreatetruecolor($w, $h);
  imagecopyresampled($s1, $s, 0, 0, 0, 0, $w, $h, $tw, $th);

  imagejpeg($s1, $new);
  imagedestroy($s1);
}
else @imagejpeg($s, $new);

@imagedestroy($s);

if (file_exists($new)) echo "<img  id='pic_ed'src=$new?rn=$rn>";

?>
<div id="back" style="position:absolute;
					  top:10px;
					  right:5px;
					  border-radius:5px;
					  font-family: 'tron';"><a href="user.php#edit-s">Back</a></div>
</body>
</html>
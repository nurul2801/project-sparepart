<?php
error_reporting(0);
 

define('IN_CB', true);
 
// if (!defined('IN_CB')) { die('You are not allowed to access to this page.'); }

if (version_compare(phpversion(), '5.0.0', '>=') !== true) {
    exit('Sorry, but you have to run this script with PHP5... You currently have the version <b>' . phpversion() . '</b>.');
}

if (!function_exists('imagecreate')) {
    exit('Sorry, make sure you have the GD extension installed before running this script.');
}

include_once('include/function.php');

// FileName & Extension
$system_temp_array = explode('/', $_SERVER['PHP_SELF']);
$filename = $system_temp_array[count($system_temp_array) - 1];
$system_temp_array2 = explode('.', $filename);
$availableBarcodes = listBarcodes();
$barcodeName = findValueFromKey($availableBarcodes, $filename);
$code = $system_temp_array2[0];

// Check if the code is valid
if (file_exists('config' . DIRECTORY_SEPARATOR . $code . '.php')) {
    include_once('config' . DIRECTORY_SEPARATOR . $code . '.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Barcode Generator</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link type="text/css" rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" href="favicon.ico" />
        <script src="jquery-1.7.2.min.js"></script>
        <script src="barcode.js"></script>
    </head>
    <body class="<?php echo $code; ?>">

<?php
$default_value = array();
$default_value['filetype'] = 'PNG';
$default_value['dpi'] = 72;
$default_value['scale'] = isset($defaultScale) ? $defaultScale : 1;
$default_value['rotation'] = 0;
$default_value['font_family'] = 'Arial.ttf';
$default_value['font_size'] = 8;
$default_value['text'] = '';
$default_value['a1'] = '';
$default_value['a2'] = '';
$default_value['a3'] = '';

$filetype = isset($_POST['filetype']) ? $_POST['filetype'] : $default_value['filetype'];
$dpi = isset($_POST['dpi']) ? $_POST['dpi'] : $default_value['dpi'];
$scale = intval(isset($_POST['scale']) ? $_POST['scale'] : $default_value['scale']);
$rotation = intval(isset($_POST['rotation']) ? $_POST['rotation'] : $default_value['rotation']);
$font_family = isset($_POST['font_family']) ? $_POST['font_family'] : $default_value['font_family'];
$font_size = '12';
$text = '123';

 


registerImageKey('filetype', $filetype);
registerImageKey('dpi', $dpi);
registerImageKey('scale', $scale);
registerImageKey('rotation', $rotation);
registerImageKey('font_family', $font_family);
registerImageKey('font_size', $font_size);
registerImageKey('text', stripslashes($text));

// Text in form is different than text sent to the image
$text = convertText($text);
 

$default_value['checksum'] = '';
$checksum = isset($_POST['checksum']) ? $_POST['checksum'] : $default_value['checksum'];
registerImageKey('checksum', $checksum);
registerImageKey('code', 'BCGcode39');

$characters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '-', '.', '&nbsp;', '$', '/', '+', '%');
?>

 

 
              <br><br>
               <br><br>
               <br><br>
             <center><form style="border-radius:50px 50px; border:1px solid black;">
            <br><br>
            
            <div class="output">
                <section class="output">
                    <h2>Print This Barcode</h2><br>
                    <?php
                        $finalRequest = '';
                        foreach (getImageKeys() as $key => $value) {
                            $finalRequest .= '&' . $key . '=' . urlencode($value);
                        }
                        if (strlen($finalRequest) > 0) {
                            $finalRequest[0] = '?';
                        }
                    ?>
                    <div id="imageOutput">
                        <?php if ($imageKeys['text'] !== '') { ?><img src="image.php<?php echo $finalRequest; ?>" alt="Barcode Image" /><?php }
                        else { ?>Fill the form to generate a barcode.<?php } ?>
                    </div>
                </section>
            </div>

        <button style="width:100px; height:40px; background:#0a0; color:white; border-radius:50px 50px; outline:none;">Print Barcode</button>
<br><br>
        </form></center>

 
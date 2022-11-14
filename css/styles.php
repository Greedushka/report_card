<?php
// The "header" is the most important part of
// this code. Without it, it will not work.
header("Content-type: text/css");

$font_family = 'Trebuchet MS, Verdana, Helvetica';
$font_size = '1.2em';
$background_color = '#b3d7ff';
$font_color = '#ffffff';

// Close the PHP code block.
?>
body {
background-color: <?php echo $background_color; ?>;
color: <?php echo $font_color; ?>;
font-size: <?php echo $font_size; ?>;
font-family: <?php echo $font_family; ?>;
}

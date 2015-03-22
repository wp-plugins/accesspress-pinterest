<?php 
//var_dump($atts);
// array
//   'image_url' => string 'https://www.pinterest.com/pin/434034482809764694/' (length=49)
$atts_image = isset($atts['image_url']) ? $atts['image_url'] : 'https://www.pinterest.com/pin/434034482809764694/';
?>
<a data-pin-do="embedPin" href="<?php echo $atts_image; ?>"></a>
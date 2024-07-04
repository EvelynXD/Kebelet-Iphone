<?php

date_default_timezone_set('Asia/Jakarta');

$nama = $_POST['nama'];
$model = $_POST['hp'];
$waktu = date('H.i');

if ($model == 'iPhone 11') {
  $url = '';
}elseif ($model == 'iPhone 11 pro') {
  $url = '';
}elseif ($model == 'iPhone 11 Pro Max') {
  $url = '';
} elseif ($model == 'iPhone 12 Mini') {
  $url = '';
} elseif ($model == 'iPhone 13') {
  $url = '';
} elseif ($model == 'iPhone 12 Pro') {
  $url = '';
} elseif ($model == 'iPhone 12 Pro Max') {
  $url = '';
} else {
  $url = '';
}

$img = imagecreatefrompng('assets/ipon-aseli.png');
// mengatur gambar lebar dan tinggi
$width = 1792;
$height = 828;

// mengatur warna background
$bg_color = imagecolorallocate($img, 255, 255, 255);

// mengatur ukuran font dan warna pada teks
$font_size = 22;
$font_size0 = 21;
$font_color = imagecolorallocate($img, 144, 144, 144);
$font_color0 = imagecolorallocate($img, 255, 255, 255);

// mengatur font file
$font_file = "assets/sf-pro-text-medium.ttf";
$font_file0 ="assets/SF-Pro-Display-Semibold.ttf";

// Get the size of the text box
$textbox = imagettfbbox($font_size, 0, $font_file, $nama);
$text_box = imagettfbbox($font_size, 0, $font_file, $model);

// Calculate the X adn y coordinate for the right-aligned text
$x = $width - $text_box[2] - 1041;
$y = ($height / 1.69) + ($text_box[1] / 1);
$namaX = $width - $textbox[2] - 1077;
$namaY = ($height / 2.70) + ($textbox[3] / 2);
$waktuX = 73;
$waktuY = 53;

// Draw the text on the image
imagettftext($img, $font_size, 0, $x, $y, $font_color, $font_file, $model);
imagettftext($img, $font_size, 0, $namaX, $namaY, $font_color, $font_file, $nama);
imagettftext($img, $font_size0, 0, $waktuX, $waktuY, $font_color0, $font_file0, $waktu);

// Definisikan nama file screenshot yang akan dibuat
$filename = $nama . '.png'; //---

// Simpan gambar
imagepng($img, $filename);

// Output the image to the browser
header("Content-type: image/png");
header('Content-Disposition: attachment; filename="' . $filename . '"');  //---
imagepng($img);

// Free up memory
imagedestroy($img);
?>

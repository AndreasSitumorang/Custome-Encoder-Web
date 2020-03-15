<?php
include_once('./AES.class.php');

$key128 = '2b7e151628aed2a6abf7158809cf4f3c';
$key192 = '8e73b0f7da0e6452c810f32b809079e562f8ead2522c6b7b';
$key256 = '603deb1015ca71be2b73aef0857d77811f352c073b6108d72d9810a30914dff4';
// =====================================================================================================
$Cipher = new AES(AES::AES256);

$content = "AndreasSitumoran"; // 16 character
print $content.'<br />';

$start = microtime(true);
$content = $Cipher->stringToHex($content);
$content = $Cipher->encrypt($content, $key256);
$end = microtime(true);
print('AES Class encryption time (256bit): '.(($end - $start)*1000).'ms <br />');
print $content.'<br />';
$start = microtime(true);
$content = $Cipher->decrypt($content, $key256);
$content = $Cipher->hexToString($content);
$end = microtime(true);
print('AES Class decryption time (256bit): '.(($end - $start)*1000).'ms <br />');
print $content.'<br />';

?>
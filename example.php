<?php
include 'base64.php';

$bs64 = new Base64;
// var_dump($bs64->decode("QW5kcmVhc1NpdHVtb3Jhbg==")); 
// var_dump($bs64->encode("AndreasSitumoran"));

$decoder_t= "hasiholan-manurung";

$decoder =$bs64->encode($decoder_t);
print($decoder);

$encoder = $bs64->decode($decoder);
print '<br />';
print '<br />';
print($encoder);

// =====================================================================================================
$Cipher = new Base64(Base64::AES256);

print '<br />';
print '<br />';
$content = "AndreasSitumoran"; // 16 character
print $content.'<br />';
$start = microtime(true);
$content = $Cipher->encrypt($content);
print $content.'<br />';
$end = microtime(true);
print '<br />';
print('AES Class encryption time (256bit): '.(($end - $start)*1000).'ms <br />');
$start = microtime(true);
print '<br/>';
print '////////////////////////////////';
print '<br/>';
$content = $Cipher->decrypt($content);
print '<br />';
print $content.'<br />';
print('AES Class decryption time (256bit): '.(($end - $start)*1000).'ms <br />');


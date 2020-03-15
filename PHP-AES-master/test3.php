<?php
include_once('./AES.class.php');
include_once('./AESCipher.class.php');
$password = 'My secret password';
$input = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
$Cipher = new AESCipher(AES::AES256); 
print('input:  '.$input.'<br />');
print('key:    '.$password.'<br />');
$start = microtime(true);
$cryptext = $Cipher->encrypt($input, $password);
$end = microtime(true);
print('AESCipher Class encryption time (256bit): '.(($end - $start)*1000).'ms <br />');
print 'cryptext: '.$cryptext.'<br />';
$start = microtime(true);
$output = $Cipher->decrypt($cryptext, $password);
$end = microtime(true);
print('AESCipher Class decryption time (256bit): '.(($end - $start)*1000).'ms <br />');
print 'message: '.$output.'<br />'; 

?>
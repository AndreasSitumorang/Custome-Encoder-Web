<?php
include_once('./AES.class.php');

$Cipher = new AES(AES::AES128);
$Cipher->selfTest();
?>
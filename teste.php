<?php
include './funcoesBD.php';

conexaoServidor();

$a = quantDeLinhas("admin");
print $a;
?>
<?php

require('vendor/autoload.php');

use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pageCount = $pdf->setSourceFile('templates/template1.pdf');




?>

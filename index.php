<?php

require_once 'vendor/autoload.php';

use Lfo19\App\Services\ReadFile\ReadFile;
use Lfo19\App\Services\ReadFile\Types\FileCSV;

$fileCSV = new FileCSV;
$fileCSV->setFile('dados.csv');

$readFile = new ReadFile($fileCSV);

echo '<pre>';
print_r($readFile->data());
echo '</pre>';
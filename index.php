<?php

require_once 'vendor/autoload.php';

use Lfo19\App\Services\ReadFile\ReadFile;
use Lfo19\App\Services\ReadFile\Types\FileCSV;
use Lfo19\App\Services\ReadFile\Types\FileTXT;

$fileCSV = new FileCSV;
$fileCSV->setFile('dados.csv');

$readFileCsv = new ReadFile($fileCSV);

$fileTXT = new FileTXT;
$fileTXT->setFile('dados.txt');

$readFileTxt = new ReadFile($fileTXT);

dd(array_merge($readFileCsv->content()['data'], $readFileTxt->content()['data']));
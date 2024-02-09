<?php

use Lfo19\App\Services\ReadFile\ReadFile;
use Lfo19\App\Services\ReadFile\Types\FileCSV;
use Lfo19\App\Services\ReadFile\Types\FileTXT;
use PHPUnit\Framework\TestCase;

class ReadFileTest extends TestCase {

    public function testLeituraArquivoTxt(){

        $fileTXT = new FileTXT;
        $fileTXT->setFile('dados.txt');

        $response = (new ReadFile($fileTXT))->data();

        self::assertCount(4, $response['data']);

    }

    public function testLeituraArquivoTxtInvalido(){

        $fileTXT = new FileTXT;
        $fileTXT->setFile('dados.docx');

        $response = (new ReadFile($fileTXT))->data();

        self::assertEquals(false, $response['success']);
        self::assertEquals('Extensão incorreta!', $response['error']);

    }

    public function testLeituraArquivoCsvNaoExiste(){

        $fileCSV = new FileCSV;
        $fileCSV->setFile('dados_xxx_123.csv');

        $response = (new ReadFile($fileCSV))->data();

        self::assertEquals(false, $response['success']);
        self::assertEquals('Arquivo não existe!', $response['error']);

    }

    public function testLeituraArquivoCsv(){

        $FileCSV = new FileCSV;
        $FileCSV->setFile('dados.csv');

        $response = (new ReadFile($FileCSV))->data();

        self::assertCount(4, $response['data']);

    }

}
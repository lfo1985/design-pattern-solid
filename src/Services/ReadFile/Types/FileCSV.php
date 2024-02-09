<?php

namespace Lfo19\App\Services\ReadFile\Types;

use Lfo19\App\Services\ReadFile\Interfaces\I_ReadFile;
use Lfo19\App\Services\ReadFile\Utils\GetFileData;

class FileCSV implements I_ReadFile {

    private $fileName;

    public function setFile(string $fileName): void{
        $this->fileName = $fileName;
    }

    public function read (): array{

        try {

            $path = DATA_FILE_PATH.$this->fileName;

            if(!file_exists($path)){
                throw new \Exception('Arquivo não existe!', 1);
            }
            
            $getFileData = new GetFileData;
            $getFileData->csv($path);

            if($getFileData->getExtension() != 'csv'){
                throw new \Exception('Extensão incorreta!', 2);
            }

            return response(true, $getFileData->getData(), null);

        } catch (\Exception $e) {

            return response(false, [], $e->getMessage());

        }

    }

}
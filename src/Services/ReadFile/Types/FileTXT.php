<?php

namespace Lfo19\App\Services\ReadFile\Types;

use Lfo19\App\Services\ReadFile\Interfaces\I_ReadFile;
use Lfo19\App\Services\ReadFile\Utils\GetFileData;

class FileTXT implements I_ReadFile
{

    private $fileName;

    public function setFile(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    public function read(): array
    {

        try {

            $getFileData = new GetFileData;
            $getFileData->txt(DATA_FILE_PATH . $this->fileName, ';');

            $output = array_map(function ($item) {

                list($nome, $cpf, $email) = $item;

                return [
                    'nome' => $nome,
                    'cpf' => $cpf,
                    'email' => $email,
                ];
            }, $getFileData->getData());

            return response(true, $output, null);
        } catch (\Exception $e) {

            return response(false, [], $e->getMessage());
        }
    }
}

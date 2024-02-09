<?php

namespace Lfo19\App\Services\ReadFile\Interfaces;

use Lfo19\App\Services\ReadFile\Utils\GetFileData;

interface I_ReadFile {

    public function read(): array;

    public function setFile(string $fileName): void;

}
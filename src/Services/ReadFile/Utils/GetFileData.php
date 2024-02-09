<?php

namespace Lfo19\App\Services\ReadFile\Utils;

class GetFileData {

    private $data;
    private $extension;
    private $dirname;
    private $basename;
    private $filename;

    public function getData():array {
        return $this->data;
    }
    public function getExtension():string {
        return $this->extension;
    }
    public function getDirName():string {
        return $this->dirname;
    }
    public function getBaseName():string {
        return $this->basename;
    }
    public function getFileName():string {
        return $this->filename;
    }
    private function setDataFile(string $path) {
        
        $meta = pathinfo($path);
    
        $this->extension = $meta['extension'];
        $this->dirname = $meta['dirname'];
        $this->basename = $meta['basename'];
        $this->filename = $meta['filename'];

    }
    public function txt(string $path, int $size = 4096): void{
        
        $handle = fopen($path, 'r');
        $data = [];
    
        while (($row = fgets($handle, $size)) !== false) {
            $data[] = $row;
        }
    
        fclose($handle);
    
        $this->data = $data;
        $this->setDataFile($path);
    
    }

    public function csv(string $path, int $limit = 10000, string $delimiter = ';'): void{
        
        $handle = fopen($path, 'r');
        $data = [];
    
        while (($row = fgetcsv($handle, $limit, $delimiter)) !== false) {
            $data[] = $row;
        }
    
        fclose($handle);
    
        $this->data = $data;
        $this->setDataFile($path);
    
    }
}
<?php

    class FileController {
        private $file; 
        private $error; 
        private $maxSize = 1000000;  
        
        function __construct($f) {
            $this->file = $f;
        }

        function getFile () {
            if (!file_exists("tmp")) {
                mkdir("tmp");
            }
            $name = "tmp/".hash("sha512",base64_encode($this->file['tmp_name']),false).'.jpg';
            if (move_uploaded_file($this->file['tmp_name'], $name)) {
                $size = filesize($name);      
                if ($size < $this->maxSize) {   
                    return addslashes(fread(fopen($name, "r"), $size));
                }  else {
                    $this->error = "<p>Tamanho máximo de ".$this->maxSize." bytes</p>";
                    return false;
                }
            } 
        }

        function getError () {
            return  $this->error;
        }
    }
?>
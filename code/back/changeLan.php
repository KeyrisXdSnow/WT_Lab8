<?php

$lan = "eng" ;


function read_file ($file_path) {
    if (file_exists($file_path)){
        $file = fopen($file_path);
        return read_file($file);
    } else echo "ini file not found";
}



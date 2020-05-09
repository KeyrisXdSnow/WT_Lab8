<?php

class LangController
{
    private $nextElement = 0 ;
    private $ini_file = "";
    private $current_section = "";
    private $sections = null;

    function __construct($ini_file_path)
    {
        $this->read_file($ini_file_path);
        $this->parse_ini_file($this->ini_file);
    }

    private function read_file ($ini_file_path) : void
    {
        if (file_exists($ini_file_path)) {
           $file = fopen($ini_file_path,"r") or die("не удалось открыть файл");

            $this->ini_file = file_get_contents($ini_file_path);
            $this->remove_comments();
        }
    }

    private function parse_ini_file ($file) : void
    {
        $str_values = preg_split("/(^|\n)\[.*?]/", $file);
        unset($str_values[0]);

        preg_match_all("/(^|\n)\[.*?]/", $file, $str_sections);
        $sections = preg_replace("/(^|\n)\[/", "", $str_sections[0]);
        $sections = preg_replace("/]/", "", $sections);
        $i = 1
        ;
        foreach ($sections as $key) {

            if (preg_match("/^(\s|\n)*\n$/", $str_values[$i]) xor $str_values[$i] == '') {
                $i++;
                continue;
            }

            $values = preg_split('/\n+?/', $str_values[$i]);
            $pars_value = array();
            foreach ($values as $value) {
                if (trim($value) == '') continue;
                $split_value = preg_split('/=/', $value);
                $pars_value[(string) trim($split_value[0])] = trim($split_value[1]);
            }
            $this->sections[$key] = $pars_value;
            $i++;
        }
    }

    private function remove_comments () : void
    {
        $this->ini_file = preg_replace('/(;|#).*?\r/','',$this->ini_file);
        $this -> ini_file = preg_replace('/\r/','',$this->ini_file);
        $this -> ini_file = preg_replace('/]\n+/',"]\n",$this->ini_file);
        $this -> ini_file = preg_replace('/\n+\[/',"\n[",$this->ini_file);
    }

    public function load_text ($section_key, $value_key) : string
    {
        if ($this->sections == null) return "";

        if ($this->current_section == $section_key and
            $this->nextElement >= count($this->sections[$this->current_section]) ) return "";
        elseif ($section_key != $this->current_section) $this->nextElement = 0 ;

        foreach (array_keys($this->sections) as $section) {
            if ($section == $section_key){
                $index = 0 ;
                foreach (array_keys($this->sections[$section]) as $key){
                    if ($key == $value_key) {
                        $this->nextElement = ++$index; // не нект элемент а следующий по позиции
                        $this->current_section = $section_key;
                        $value = $this->sections[$section_key][$key];
                        $value = preg_replace("/^(['\"])/","",$value);
                        $value = preg_replace("/(['\"])$/","",$value);
                        return $value;
                    }
                    ++$index;
                }
                break;
            }
        }
        return "";
    }

    public function auto_load_text ($section_key) : string
    {
        if ($this->sections == null) return "";

        if ($this->current_section == $section_key and
            $this->nextElement >= count($this->sections[$this->current_section]) ) return "";
        elseif ($section_key != $this->current_section) $this->nextElement = 0 ;

        foreach (array_keys($this->sections) as $a_section_key) {
            if ($a_section_key == $section_key){
                $value = array_values($this->sections[$section_key])[$this->nextElement++];
                $value = preg_replace("/^(['\"])/","",$value);
                $value = preg_replace("/(['\"])$/","",$value);
                $this->current_section = $section_key;
                return  $value;
            }
        }
        return "";
    }
}


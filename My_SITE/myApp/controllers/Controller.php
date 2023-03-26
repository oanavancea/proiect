<?php

class Controller
{
    public function __construct(){
        echo __FILE__;
    }

    public function render($page, $data = array()){ // data este un array asociativ
        $template = file_get_contents($page);

            // caută toate placeholderele

        preg_match_all("[{{\w+}}]", $template, $matches);

            // înlocuim placeholderele cu informație propriu zisă (cod HTML)

        foreach($matches[0] as $value){
            $item = str_replace('{{','', $value);
            $item = str_replace('}}','', $item);
            if(array_key_exists($item, $data)){
                $template = str_replace($value, $data[$item], $template);
            }
        }
        return $template;
    }
}
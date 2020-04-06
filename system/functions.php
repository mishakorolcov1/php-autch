<?php

    function dd($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

    function __($text){
        global $languages;
        if($_SESSION['lang'] == 'ru'){
            return $text;
        }
        return $languages[$text];
    }
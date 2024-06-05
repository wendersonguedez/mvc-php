<?php

namespace App\Utils;

class Debug {
    public static function debug($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        die();
    }
}
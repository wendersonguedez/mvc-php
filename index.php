<?php

require_once './vendor/autoload.php';

use App\Controllers\Pages\Home;

echo Home::renderHomePage();
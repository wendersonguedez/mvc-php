<?php

namespace App\Controllers\Pages;

use App\Models\Entity\Organization;
use App\Utils\Debug;
use App\Utils\View;

class Home extends Render {

    /**
     * Método responsável por renderizar a página home.
     * @return string
     *
     */
    public static function renderHomePage(): string
    {
        $organization = new Organization();

        $content_page = View::render('pages', 'home', [
            'name' => $organization->name,
            'description' => $organization->description
        ]);

        return parent::renderFullPage('MVC - Home Page', $content_page);
    }
}
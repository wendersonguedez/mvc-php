<?php

namespace App\Controllers\Pages;

use App\Utils\Debug;
use App\Utils\View;

class Render {

    /**
     * Obtém o conteúdo do cabeçalho.
     *
     * @return string
     */
    protected static function getHeader(): string
    {
        return View::render('partials', 'header');
    }

    /**
     * Obtém o conteúdo do rodapé.
     *
     * @return string
     */
    protected static function getFooter(): string
    {
        return View::render('partials', 'footer');
    }

    /**
     * Renderiza a página completa com cabeçalho, conteúdo e rodapé.
     *
     * @param string $title_page Título da página.
     * @param string $content_page Conteúdo da página.
     * @return string Página renderizada completa.
     */
    public static function renderFullPage(string $title_page, string $content_page): string
    {
        return View::render('pages', 'app', [
            'title' => $title_page,
            'content' => $content_page,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
        ]);
    }
}
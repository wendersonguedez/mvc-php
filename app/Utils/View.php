<?php

namespace App\Utils;

use Exception;

class View
{
    /**
     * Retorna o caminho completo de um arquivo, que pode ser uma view ou uma parte de código (partial).
     *
     * @param string $directory O diretório onde o arquivo está localizado (por exemplo, 'pages' ou 'partials')
     * @param string $file_name O nome do arquivo (sem a extensão .html)
     * @return string O caminho completo do arquivo.
     * @throws Exception
     */
    protected static function getFilePath(string $directory, string $file_name): string
    {
        $file_path = __DIR__ . "/../../resources/views/{$directory}/" . $file_name . ".html";

        if (!file_exists($file_path)) {
            throw new Exception("Arquivo não encontrado em: {$directory}");
        }
        return $file_path;
    }

    /**
     * @throws Exception
     */
    private static function getFileContent(string $directory, string $file_name): string
    {
        $file_path = self::getFilePath($directory, $file_name);

        $file_content = file_get_contents($file_path);

        if ($file_content === false) {
            throw new Exception('Falha ao ler o arquivo');
        }
        return $file_content;
    }

    /**
     * @throws Exception
     */
    /*private static function getPartialsContent($partials_name): string
    {
        return self::getFileContent('partials', $partials_name);
    }*/

    /*private static function getViewContent($view_name)
    {
        return self::getFileContent('pages', $view_name);
    }*/

    private static function replacePlaceholders(string $file_content, array $file_data): string
    {
        /*
         * Utilizando array_map.
         *
         * $placeholders = array_map(fn ($array_key) => '{{ $' . $array_key . ' }}', array_keys($data));
         * */

        foreach ($file_data as $key => $value) {
            $file_content = str_replace('{{ $' . $key . ' }}', $value, $file_content);
        }

        /*Debug::debug($file_content);*/
        return $file_content;
    }

    /**
     * Método para retornar a view renderizada e com conteúdo dinâmico.
     * @param string $file_name
     * @param array $file_data
     * @return string Ex.: '<h1>Home Page</h1>'
     */
    public static function render(string $directory, string $file_name, array $file_data = []): string
    {
        try {
            $file_content = self::getFileContent($directory, $file_name);

            return self::replacePlaceholders($file_content, $file_data);
        } catch (Exception $e) {
            return 'Erro ao carregar o arquivo: ' . $e->getMessage();
        }
    }
}
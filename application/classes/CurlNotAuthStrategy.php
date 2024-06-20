<?php

namespace GabrielBinottiCurl\classes;

use GabrielBinottiCurl\interfaces\InterfaceCurlAuthStrategy;

/**
 * Classe responsavel por possuir métodos de configurações da atutenticação para uma requisição cURL
 * quando a autenticação não é necessária.
 */
class CurlNotAuthStrategy implements InterfaceCurlAuthStrategy
{

    /**
     * Método para configurar a autenticação de uma requisição cURL
     * @param mixed $curlHandle represente a variavel que contem o curl_init()
     * @param array $auth_details array com os dados para autenticação
     */
    public function setCurlAuthStrategy($curlHandle, array $auth_details)
    {
        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json'
        ]);
    }

}
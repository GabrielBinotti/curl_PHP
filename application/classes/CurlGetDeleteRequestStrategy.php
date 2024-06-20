<?php

namespace GabrielBinottiCurl\classes;

use GabrielBinottiCurl\interfaces\InterfaceCurlStrategy;


/**
 * Classe CurlGetDeleteRequestStrategy que implementa a interface InterfaceCurlStrategy configurando
 * as opções de uma requisição DELETE usando o cURL quando não precisa ser enviado nada no corpo da requisição.
 */
class CurlGetDeleteRequestStrategy implements InterfaceCurlStrategy
{

    /**
     * Método para configuração de uma requisição GET usando o cURL
     * 
     * @param mixed $curlHandle Parametro que representa o curl_init()
     * @param array $options array com os dados que são dinamicos na configuração
     */
    public function setOptions($curlHandle, array $options): void
    {
        curl_setopt($curlHandle, CURLOPT_URL, $options["url"]);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_ENCODING, '');
        curl_setopt($curlHandle, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlHandle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

    }
}

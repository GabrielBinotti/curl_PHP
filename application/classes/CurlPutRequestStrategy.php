<?php
namespace GabrielBinottiCurl\classes;

use GabrielBinottiCurl\interfaces\InterfaceCurlStrategy;


/**
 * Classe CurlPutRequestStrategy que implementa a interface InterfaceCurlStrategy configurando
 * as opções de uma requisição PUT usando o cURL.
 */
class CurlPutRequestStrategy implements InterfaceCurlStrategy
{

    /**
     * Método para configuração de uma requisição GET usando o cURL
     * 
     * @param mixed $curlHandle Parametro que representa o curl_init()
     * @param array $options array com os dados que são dinamicos na configuração
     */
    public function setOptions($curlHandle, array $options = null): void
    {
        curl_setopt($curlHandle, CURLOPT_URL, $options["url"]);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_ENCODING, '');
        curl_setopt($curlHandle, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlHandle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        if(!empty($options['body'])) {
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, json_encode($options['body']));
        }

    }
}

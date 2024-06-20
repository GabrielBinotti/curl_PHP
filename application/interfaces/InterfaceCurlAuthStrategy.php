<?php

namespace GabrielBinottiCurl\interfaces;

/**
 * Interface responsavel por criar um contrato para as classes que implementarem forem obrigadas
 * a implementar o método de configuração da autenticação.
 */
interface InterfaceCurlAuthStrategy
{
    public function setCurlAuthStrategy($curlHandle, array $auth_details);
}
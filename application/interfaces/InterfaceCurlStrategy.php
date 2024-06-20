<?php
declare(strict_types=1);
namespace GabrielBinottiCurl\interfaces;

/**
 * Interface padrão para criar uma requisição cURL simples onde é configurado as opções da requisição.
 */
interface InterfaceCurlStrategy
{
    public function setOptions($curlHandle, array $options): void;
}
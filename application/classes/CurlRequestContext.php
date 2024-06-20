<?php
namespace GabrielBinottiCurl\classes;

use GabrielBinottiCurl\interfaces\InterfaceCurlAuthStrategy;
use GabrielBinottiCurl\interfaces\InterfaceCurlStrategy; 

/**
 * Classe responsável por implementar toda a lógica do cURL.
 */
class CurlRequestContext
{
    private InterfaceCurlStrategy $request_strategy; 
    private InterfaceCurlAuthStrategy $auth_strategy; 

    /**
     * Construtor da classe que inicializa a estratégia de requisição.
     * 
     * @param InterfaceCurlStrategy $request_strategy Estratégia de requisição a ser usada.
     */
    public function __construct(InterfaceCurlStrategy $request_strategy)
    {
        $this->request_strategy = $request_strategy;
    }

    /**
     * Define uma nova estratégia de requisição.
     * 
     * @param InterfaceCurlStrategy $request_strategy Nova estratégia de requisição.
     */
    public function setRequestStrategy(InterfaceCurlStrategy $request_strategy): void
    {
        $this->request_strategy = $request_strategy;
    }

    /**
     * Define uma nova estratégia de autenticação.
     * 
     * @param InterfaceCurlAuthStrategy $auth_strategy Nova estratégia de autenticação.
     */
    public function setAuthStrategy(InterfaceCurlAuthStrategy $auth_strategy): void
    {
        $this->auth_strategy = $auth_strategy;
    }

    /**
     * Executa a requisição cURL com as opções e detalhes de autenticação fornecidos.
     * 
     * @param array $options Opções para configurar a requisição cURL.
     * @param array|null $auth_details Detalhes de autenticação (opcional).
     * @return string Retorna a resposta da requisição cURL.
     * 
     * @throws \RuntimeException Se a sessão cURL não puder ser iniciada.
     * @throws \Exception Se ocorrer um erro na execução da requisição cURL.
     */
    public function execute(array $options, array $auth_details = null): string
    {
        // Inicializa uma sessão cURL
        $curlHandle = curl_init();

        // Verifica se a inicialização da sessão cURL falhou
        if ($curlHandle === false) {
            throw new \RuntimeException('Falha ao iniciar a sessão cURL!.');
        }

        // Se detalhes de autenticação são fornecidos e a estratégia de autenticação está definida
        if ($auth_details !== null && $this->auth_strategy !== null) {
            // Configura a autenticação cURL usando a estratégia definida
            $this->auth_strategy->setCurlAuthStrategy($curlHandle, $auth_details);
        }

       
        // Configura as opções da requisição cURL usando a estratégia de requisição definida
        $this->request_strategy->setOptions($curlHandle, $options);

        // Executa a requisição cURL
        $res = curl_exec($curlHandle);

        // Verifica se houve um erro na execução da requisição cURL
        if ($res === false) {
            throw new \Exception("Erro de requisição: " . curl_error($curlHandle));
        }

        // Fecha a sessão cURL
        curl_close($curlHandle);

        // Retorna a resposta da requisição cURL
        return $res;
    }
}

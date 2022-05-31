<?php

namespace App\Services;

use Exception;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GetStudies
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
       $this->httpClient = $httpClient;
    }

    public function getRequest($method, $dominio)
    {
        
        $response = $this->httpClient->request($method, $dominio);

        $statusCode = $response->getStatusCode();

        if($statusCode !== 200){
            throw new Exception('Error recuperando libros');
        }

        $contentType = $response->getHeaders()['content-type'][0];
        
        // $content = $response->getContent();

        $content = $response->toArray();

        return $content;

    }
}
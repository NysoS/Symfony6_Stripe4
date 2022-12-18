<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class Product_CMS {

    public function __construct(private HttpClientInterface $client, private ContainerBagInterface $params)
    {
    }
    
    public function getProducts() : Array
    {
        $response = $this->client->request(
            'GET',
            $this->params->get("strapi_url")."products?populate=image",
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '. $this->params->get("strapi_token")
                ],
            ]
        );

        return $response->toArray()['data'];
    }

}
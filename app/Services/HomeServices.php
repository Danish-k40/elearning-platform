<?php

namespace App\Services;
use GuzzleHttp\Client;




class HomeServices
{

    public function getCourses()
    {
        $client = new Client;

        $response = $client->get("https://api.alison.com/v0.1/search?include_summary=1&locale=en&category=it&page=1&size=16");

        $body = $response->getBody()->getContents();
        return json_decode($body, true);
    }

}

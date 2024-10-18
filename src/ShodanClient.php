<?php

class ShodanClient
{
    private $apiKey;
    private $baseUrl = 'https://api.shodan.io';

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    // Fungsi untuk memanggil API Shodan
    public function search($query)
    {
        $url = $this->baseUrl . '/shodan/host/search?key=' . $this->apiKey . '&query=' . urlencode($query);
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}

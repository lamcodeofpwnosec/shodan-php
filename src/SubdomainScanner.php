<?php

class SubdomainScanner
{
    private $shodanClient;

    public function __construct($shodanClient)
    {
        $this->shodanClient = $shodanClient;
    }

    // Fungsi untuk mencari subdomain
    public function scanSubdomains($domain)
    {
        $query = 'hostname:' . $domain;
        $results = $this->shodanClient->search($query);

        if (isset($results['matches'])) {
            $subdomains = [];

            foreach ($results['matches'] as $match) {
                $subdomains[] = [
                    'ip' => $match['ip_str'],
                    'hostname' => $match['hostnames'],
                ];
            }

            return $subdomains;
        }

        return [];
    }
}

<?php

require '../vendor/autoload.php'; // Autoloader dari Composer
require '../src/ShodanClient.php';
require '../src/SubdomainScanner.php';

// Load konfigurasi
$config = include('../config/config.php');

// Inisialisasi ShodanClient dengan API key
$shodanClient = new ShodanClient($config['shodan_api_key']);
$scanner = new SubdomainScanner($shodanClient);

// Masukkan domain yang ingin discan
$domain = 'example.com'; // Ganti dengan domain target

// Jalankan pemindaian subdomain
$subdomains = $scanner->scanSubdomains($domain);

// Tampilkan hasil
echo '<pre>';
print_r($subdomains);
echo '</pre>';

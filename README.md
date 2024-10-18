# PHP Subdomain Shodan Enumerate
Proyek ini bertujuan untuk membuat subdomain scanner yang menggunakan Shodan API Premium untuk menemukan informasi subdomain yang terkait dengan suatu domain target. Informasi yang didapatkan termasuk IP address dan hostname dari hasil pemindaian Shodan. Scanner ini memanfaatkan fitur pencarian Shodan API untuk memfilter hasil berdasarkan nama host (hostname) dan IP secara efektif.

Shodan adalah salah satu mesin pencari yang dirancang untuk menemukan perangkat yang terhubung ke internet (seperti server, router, webcam, dll.) dan mengindeks informasi terkait. Namun, dengan menggunakan API Shodan, kita dapat melakukan pencarian yang lebih spesifik, termasuk menemukan subdomain dari suatu domain tertentu.

## Fitur Proyek
 1. **Pemanfaatan Shodan API Premium:** Dengan menggunakan API ini, pengguna dapat mengakses data yang lebih mendalam dan akurat, dibandingkan dengan versi API gratis.
 1. **Pencarian Berdasarkan Hostname dan IP:** Proyek ini memungkinkan pencarian berdasarkan domain utama dan mengembalikan data subdomain terkait.
 1. **Menyediakan Informasi Subdomain secara Lengkap:** Data yang ditampilkan berupa hostname dan IP address dari subdomain yang ditemukan.
 1. **Desain Modular:** Proyek ini diatur dengan struktur yang modular dan bersih untuk mempermudah pengembangan lebih lanjut, pemeliharaan, dan pembaruan fitur.
 1. **Fleksibilitas Pencarian:** Anda dapat dengan mudah mengubah domain target yang ingin di-scan tanpa mengubah banyak kode, cukup dengan mengganti parameter di index.php.
 1. **Cocok untuk Integrasi Lanjut:** Proyek ini dapat diintegrasikan dengan berbagai aplikasi atau platform lain, baik untuk tujuan analisis lebih lanjut atau sistem keamanan yang lebih kompleks.

## Cara Kerja Proyek
 1. **API Shodan:** Proyek ini menggunakan Shodan API untuk mengambil data dari hasil pencarian yang berkaitan dengan hostname atau domain tertentu. Setiap pencarian menghasilkan berbagai informasi, namun proyek ini secara khusus memfokuskan pada subdomain, IP, dan hostname.
 1. **ShodanClient:** Kelas ini bertanggung jawab untuk berkomunikasi dengan API Shodan. Ia memanggil API dengan query yang diberikan, mengembalikan data mentah dari API, lalu mengonversinya menjadi array PHP yang dapat diolah lebih lanjut.
 1. **SubdomainScanner:** Kelas ini menerima input domain (misalnya, example.com) dan menggunakan `ShodanClient` untuk mengeksekusi pencarian subdomain terkait. Ia memfilter hasil yang didapatkan untuk menampilkan data subdomain yang relevan (IP address dan hostname).
 1. **Output:** Hasil pemindaian ditampilkan dalam format yang mudah dibaca pada browser atau console output, menampilkan hostname dan IP yang terkait dengan domain target.

## Persyaratan Instalasi
**PHP versi 7.4 atau lebih baru**
**Composer:** Untuk mengelola dependensi proyek
**Shodan API Premium:** Untuk mendapatkan hasil pencarian yang lebih komprehensif
**GuzzleHTTP:** Digunakan untuk melakukan HTTP request ke API Shodan

## Panduan Instalasi
 1. Clone Repository: Clone atau unduh project ini ke direktori lokal Anda.
```
git clone https://github.com/lamcodeofpwnosec/shodan-php.git
```
 2. Masuk ke Direktori Proyek:
```
cd shodan-php
```
 3. Install Composer Dependencies:
Pastikan Anda telah menginstall Composer di mesin lokal Anda, lalu jalankan perintah:
```
composer install
```
 4. Konfigurasi API Key:
Buat file `.env` di root proyek Anda dan tambahkan API Key Anda dari Shodan.
```
SHODAN_API_KEY=your_shodan_api_key_here
```
 5. Sesuaikan Konfigurasi (Opsional):
Jika Anda ingin mengubah batas jumlah hasil yang dikembalikan atau pengaturan lainnya, buka `config/config.php` dan sesuaikan parameternya.

 6. Jalankan Aplikasi:
Untuk menjalankan proyek di server lokal, jalankan PHP built-in server:
```
php -S localhost:8000 -t public
```
Buka browser dan arahkan ke `localhost:8000` untuk melihat hasilnya.

## Panduan Penggunaan
1. Buka **index.php** dan ganti domain yang ingin Anda scan pada variabel `$domain`.
```php
$domain = 'example.com'; // Ganti dengan domain target Anda
```
2. Jalankan aplikasi di browser. Setelah aplikasi berjalan, hasil pencarian subdomain (termasuk IP dan hostname) akan ditampilkan di layar.

### Contoh Hasil Output
Setelah menjalankan aplikasi, berikut adalah contoh hasil output yang ditampilkan:
```
Array
(
    [0] => Array
        (
            [ip] => 192.168.1.1
            [hostname] => sub1.example.com
        )

    [1] => Array
        (
            [ip] => 192.168.1.2
            [hostname] => sub2.example.com
        )
)
```
Hasil tersebut akan menampilkan subdomain dari domain `example.com` beserta IP yang terhubung dengan setiap subdomain.


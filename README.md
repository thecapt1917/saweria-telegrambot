# Send Saweria Alert to Telegram Bot

Pogram ini berfungsi untuk mengirim notifikasi donasi saweria ke bot telegram

Atau bisa gunakan Bot Telegram [**@sawerialertbot**](https://t.me/sawerialertbot)

## Cara Menggunakan

1. Rename `config.example.php` menjadi `config.php`
2. Lakukan konfigurasi pada file `config.php`

```php
// config.php
<?php
define('BOT_VER', '1.1');
define('BOT_OWNER', '');
define('WHPATH', '/bot/webhook');

define('DOMAIN', 'YOUR_DOMAIN'); // you can use NGROK for testing
define('BOT_KEY', 'YOUR_TELEGRAM_BOT_TOKEN');
```

3. Jalankan menggunakan [Laragon](https://laragon.org/) atau program lain yang sudah mendukung _Virtual Host_ **\*) _Opsional_**
4. Buka halaman `https://[DOMAIN_KAMU]/webhook/set` untuk mengaktifkan _webhook_ bot telegram

## Daftar Perintah

| Perintah | Keterangan           |
| -------- | -------------------- |
| /start   | Memulai bot          |
| /help    | Bantuan              |
| /url     | Generate URL Webhook |

Perintah **/url** menghasilkan sebuah URL UNIK `https://[DOMAIN_KAMU]/webhook/[ID_UNIK]` yang digunakan sebagai alamat webhook pada website Saweria

## Konfigurasi di Website Saweria

1. Login ke akun Saweria kamu
2. Buka menu [**Integration**](https://saweria.co/admin/integrations)
3. Pada menu **Webhook**, _input_ URL UNIK yang didapatkan dari bot
4. Jangan lupa nyalakan _webhook_ dan simpan!
5. Klik tombol **Munculkan Notifikasi** untuk melakukan tes

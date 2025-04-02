<?php
include_once(__DIR__ . '/tg.php');
// include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/../helpers/crypto.php');

class Cmd
{
    public static function start(string $name): string
    {
        return "👋 Welcome <b>{$name}</b> to <b>SaweriAlert Bot!</b> 🤖🦊\n
Terima kasih telah bergabung. 🎉
<b>SaweriAlert Bot</b> adalah bot <i>unofficial</i> untuk menerima alert/notifikasi donasi yang masuk ke akun saweria kamu dengan memanfaatkan fitur <b>webhook</b> 🌟\n
Gunakan perintah <code>/url</code> untuk mendapatkan URL webhook saweria\n
🚀 Dibuat oleh <b>Galih S</b> a.k.a <b>StpN_17</b>";
    }

    public static function generateUrl(string $userID): string
    {
        $whID = AES::Encrypt($userID);
        $whURL = DOMAIN . '/webhook/' . $whID;

        $text = "<b>🔗 Salin Tautan di Bawah!</b> 👇\n
<code>{$whURL}</code>\n\nMasukkan link di atas ke akun Saweria kamu\nJalankan /help untuk mendapatkan bantuan";

        return $text;
    }

    public static function help(): array
    {
        $text = "===== <b>📘 PANDUAN</b> =====\n
1. 🌐 <b>Buka Saweria:</b> Buka browser dan kunjungi Saweria.co.\n
2. 🚪 <b>Login:</b> Masuk ke akun Saweria kamu.\n
3. 🔗 <b>Klik Integration:</b> Di dalam dashboard, klik tombol \"Integration\".\n
4. 🎛️ <b>Pilih Webhook:</b> Klik \"Webhook\" dari opsi yang tersedia.\n
5. 🔌 <b>Nyalakan Webhook:</b> Klik tombol \"nyalakan\" untuk mengaktifkan Webhook. <i>Pastikan tombol bewarna biru</i>\n
6. 🔗 <b>Tambahkan URL Webhook:</b> Paste link webhook yang telah kamu salin sebelumnya ke \"Webhook URL\".\n
7. 💾 <b>Simpan:</b> Klik \"Simpan\" agar perubahan tersimpan.
              
🚀 Kamu telah berhasil mengintegrasikan tautan dengan Saweria.co menggunakan webhook! 🎮🎉";

        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'Kirim Pesan ke Developer 📩', 'url' => 'https://t.me/yuckfou00']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        return [$text, $encodedKeyboard];
    }
}

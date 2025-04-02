<?php
include_once(__DIR__ . '/bot/tg.php');
include_once(__DIR__ . '/helpers/crypto.php');

function intToRupiah(int $number)
{
    $hasil_rupiah = "Rp" . number_format($number, 0, ',', '.');
    return $hasil_rupiah;
}

// CODE

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data) && isset($id)) {
    $userID = AES::Decrypt($id);

    $potongan = preg_replace('/[^0-9]/', '', $data['cut']);
    $isUser = $data['donator_is_user'] ? 'TERDAFTAR' : 'TIDAK TERDAFTAR';
    $donasiBersih = intToRupiah($data['amount_raw'] - $potongan);
    $data['type'] = strtoupper($data['type']);
    $data['amount_raw'] = intToRupiah($data['amount_raw']);
    $data['cut'] = intToRupiah($potongan);

    $reply = "<b>** DONASI DITERIMA! **</b> 🎉\n<b><i>Selamat kamu mendapatkan donasi dari</i> {$data['donator_name']}</b>\n
<b>** INFORMASI DONASI **</b>\n<code>🕒 Diterima:</code> <b>{$data['created_at']}</b>
<code>🆔 ID      :</code> <code>{$data['id']}</code>
<code>🎁 Tipe    :</code> <b>{$data['type']}</b>
    
<code>💰 Jumlah  :</code> <b>{$data['amount_raw']}</b>
<code>💔 Potongan:</code> <b>{$data['cut']}</b>
<i>Donasi yang kamu terima sebesar <b>{$donasiBersih}</b></i>
    
<code>👤 Donatur :</code> <b>{$data['donator_name']}</b>
<code>💬 Pesan   :</code> <blockquote><b>\"{$data['message']}\"</b></blockquote>
<code>📧 Email   :</code> <code>{$data['donator_email']}</code>
<code>👤 User    :</code> <b>{$isUser}</b>";

    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => 'DONASI 💸 #SupportDeveloper', 'url' => 'https://saweria.co/StpN17']
            ]
        ]
    ];
    $encodedKeyboard = json_encode($keyboard);

    if (mt_rand(1, 3) == 3) {
        $r = "<b>Jika kamu terbantu dengan bot ini. Kamu bisa donasi melalui menu di bawah</b> 😊\n✅ Donasi yang kamu berikan akan digunakan untuk pemeliharaan server BOT\n<i>Terima kasih</i>";
        TgApi::sendMessage($userID, $reply);
        TgApi::sendMessage($userID, $r, true, $encodedKeyboard);
    } else {
        TgApi::sendMessage($userID, $reply, true, $encodedKeyboard);
    }
} else {
    header('location: /');
}

<?php

class AES
{
    private const iv = 'Jrg3T2gcDCL7v57P';
    private const KEY = 'Ghost17';

    public static function Encrypt($data)
    {
        $cipher = "aes-256-cbc";
        $options = OPENSSL_RAW_DATA;
        $encrypted = openssl_encrypt($data, $cipher, self::KEY, $options, self::iv);
        return bin2hex($encrypted);
    }

    public static function Decrypt($encryptedData)
    {
        $cipher = "aes-256-cbc";
        $options = OPENSSL_RAW_DATA;
        $decrypted = openssl_decrypt(hex2bin($encryptedData), $cipher, self::KEY, $options, self::iv);
        return $decrypted;
    }
}

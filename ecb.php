<?php

function dataEncrypt(string $data, string $key): string
{
    $method = 'AES-256-ECB';
    $options = OPENSSL_RAW_DATA;
    $iv = '';

    $encrypted = openssl_encrypt($data, $method, $key, $options, $iv);

    return $encrypted;
}

function dataDecrypt(string $data, string $key): string
{
    $method = 'AES-256-ECB';
    $options = OPENSSL_RAW_DATA;
    $iv = '';

    $decrypted = openssl_decrypt($data, $method, $key, $options, $iv);

    return $decrypted;
}

$data = "Data for encrypt";
$key = "5fH7jK2pL9qR3tA6";

$encryptedData = dataEncrypt($data, $key);
$decryptedData = dataDecrypt($encryptedData, $key);

echo "Encrypted: " . base64_encode($encryptedData) . PHP_EOL;
echo "Decrypted: " . $decryptedData . PHP_EOL;

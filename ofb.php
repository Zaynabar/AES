<?php

function ofbEncrypt(string $data, string $key, string $iv): string
{
    $method = 'AES-256-OFB';
    $options = OPENSSL_RAW_DATA;

    $encrypted = openssl_encrypt($data, $method, $key, $options, $iv);

    return $encrypted;
}

function ofbDecrypt(string $data, string $key, string $iv): string
{
    $method = 'AES-256-OFB';
    $options = OPENSSL_RAW_DATA;

    $decrypted = openssl_decrypt($data, $method, $key, $options, $iv);

    return $decrypted;
}

$data = "Some secret data";
$key = "B8cE2fG5hI1jA3k";
$iv = openssl_random_pseudo_bytes(16); 

$encryptedData = ofbEncrypt($data, $key, $iv);
$decryptedData = ofbDecrypt($encryptedData, $key, $iv);

echo "Encrypted: " . base64_encode($encryptedData) . PHP_EOL;
echo "Decrypted: " . $decryptedData . PHP_EOL;

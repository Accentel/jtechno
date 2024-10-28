<?php

// Path to the public key file
$publicKeyPath = 'getacert.cer';

// Path to the signature file
$signaturePath = 'test.sig';

// Content of the original document
$document = file_get_contents('original_document.txt');

// Check if files exist and are readable
if (!file_exists($publicKeyPath) || !is_readable($publicKeyPath) || !file_exists($signaturePath) || !is_readable($signaturePath)) {
    die('Files not found or inaccessible');
}

// Content of the signature file
$signature = file_get_contents($signaturePath);

// Load the public key
$publicKey = openssl_pkey_get_public(file_get_contents($publicKeyPath));

if ($publicKey === false) {
    die('Failed to load public key');
}

// Verify the signature against the original document
$isValid = openssl_verify($document, $signature, $publicKey, OPENSSL_ALGO_SHA256);

// Check if the signature is valid
if ($isValid === 1) {
    echo 'Signature is valid';
} elseif ($isValid === 0) {
    echo 'Signature is invalid';
} else {
    echo 'Error verifying signature';
}

// Free the key from memory
// openssl_free_key($publicKey);

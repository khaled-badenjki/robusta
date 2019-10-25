<?php

namespace App;

use App\ShiftEncryptionProvider;

class Cli {

public function __construct()
{
    $handle = fopen ("php://stdin", "r");

    echo "Please enter the string you would like to encrypt or decrypt: \n";
    $data = fgets($handle);

    echo "Please choose the encryption algorithm: \n 1- Shift Encryption \n 2- Matrix Encryption \n";
    $type = fgets($handle);

    echo "Please choose the type of operation: \n 1- Encrypt \n 2- Decrypt \n";
    $opr = fgets($handle);

    $encrypter = new ShiftEncryptionProvider(3);

    switch ($type)
    {
        case 1:
            $encrypter = new ShiftEncryptionProvider(3);
            break;
        case 2:
            $encrypter = new MatrixEncryptionProvider;
            break;
        default:
            throwException('invalid');
    }

    switch ($opr) {
        case 1:
            $result = $encrypter->encrypt($data);
            break;
        case 2:
            $result = $encrypter->decrypt($data);
            break;
        default:
            throwException('invalid');
    }

    echo "The result is: \n $result";

    echo "\n";
    echo "Thank you, continuing...\n";
}




}
<?php

namespace App;

require_once ('ShiftEncryptionProvider.php');
require_once ('MatrixEncryptionProvider.php');
require_once ('ReverseEncryptionProvider.php');
require_once ('Helper.php');


class Cli {

    public $shiftProvider;

    public $matrixProvider;

    public $reverseProvider;

public function __construct(ShiftEncryptionProvider $shiftEncrypter, MatrixEncryptionProvider $matrixEncrypter, ReverseEncryptionProvider $reverseEncrypter)
{

    $this->shiftProvider = $shiftEncrypter;

    $this->matrixProvider = $matrixEncrypter;

    $this->reverseProvider = $reverseEncrypter;

    $handle = fopen ("php://stdin", "r");

    echo "Please enter the string you would like to encrypt or decrypt: \n";
    $data = trim(fgets($handle));

    echo "Please choose the encryption algorithm: \n 1- Shift Encryption \n 2- Matrix Encryption \n 3- Reverse Encryption \n";
    $type = fgets($handle);

    echo "Please choose the type of operation: \n 1- Encrypt \n 2- Decrypt \n";
    $operation = fgets($handle);

    switch ($type)
    {
        case 1:
            $encrypter = $this->shiftProvider;
            break;
        case 2:
            $encrypter = $this->matrixProvider;
            break;
        case 3:
            $encrypter = $this->reverseProvider;
            break;
        default:
            throwException('invalid');
    }

    switch ($operation) {
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
    echo "Thank you ...\n";
}

}

$helper = new Helper();
$shiftEncrypter = new ShiftEncryptionProvider($helper);
$matrixEncrypter = new MatrixEncryptionProvider($helper);
$reverseEncrypter = new ReverseEncryptionProvider($helper);

$cli = new Cli($shiftEncrypter, $matrixEncrypter, $reverseEncrypter);
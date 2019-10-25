<?php

namespace App;

require_once ('ShiftEncryptionProvider.php');
require_once ('MatrixEncryptionProvider.php');

class Cli {

    public $shiftProvider;

    public $matrixProvider;

public function __construct(ShiftEncryptionProvider $shiftEncrypter, MatrixEncryptionProvider $matrixEncrypter)
{

    $this->shiftProvider = $shiftEncrypter;

    $this->matrixProvider = $matrixEncrypter;

    $handle = fopen ("php://stdin", "r");

    echo "Please enter the string you would like to encrypt or decrypt: \n";
    $data = trim(fgets($handle));

    echo "Please choose the encryption algorithm: \n 1- Shift Encryption \n 2- Matrix Encryption \n";
    $type = fgets($handle);

    echo "Please choose the type of operation: \n 1- Encrypt \n 2- Decrypt \n";
    $opr = fgets($handle);

    switch ($type)
    {
        case 1:
            $encrypter = $this->shiftProvider;
            break;
        case 2:
            $encrypter = $this->matrixProvider;
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

$shiftEncrypter = new ShiftEncryptionProvider(3);
$matrixEncrypter = new MatrixEncryptionProvider();

$cli = new Cli($shiftEncrypter, $matrixEncrypter);
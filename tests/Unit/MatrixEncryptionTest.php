<?php

use App\Helper;
use App\MatrixEncryptionProvider;
use PHPUnit\Framework\TestCase;

class MatrixEncryptionTest extends TestCase
{

    /** @test */
    public function it_can_encrypt(){

        $data = 'hi';

        $helper = new Helper();

        $matrixEncrypter = new MatrixEncryptionProvider($helper);

        $encryptedData = $matrixEncrypter->encrypt($data);

        // Complete the implementation.
        $this->assertEquals("15,12,12,14,15,15,14,9,6,14,12,8,8,20,17,5,20,21,13,18,17,18,15,9,6,22,17,14,17,29,24,5,", $encryptedData);

        $decryptedData = $matrixEncrypter->decrypt($encryptedData);

        $this->assertEquals($decryptedData, $data);

    }

}

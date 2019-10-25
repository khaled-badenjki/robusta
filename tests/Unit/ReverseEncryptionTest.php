<?php

use App\Helper;
use App\ReverseEncryptionProvider;
use PHPUnit\Framework\TestCase;

class ReverseEncryptionTest extends TestCase
{

    /** @test */
    public function it_can_encrypt(){

        $data = 'hi';

        $helper = new Helper();

        $matrixEncrypter = new ReverseEncryptionProvider($helper);

        $encryptedData = $matrixEncrypter->encrypt($data);

        // Complete the implementation.
        $this->assertEquals("ih", $encryptedData);

        $decryptedData = $matrixEncrypter->decrypt($encryptedData);

        $this->assertEquals($decryptedData, $data);

        echo $encryptedData;

    }

}

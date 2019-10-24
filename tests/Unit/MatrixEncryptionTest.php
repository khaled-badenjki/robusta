<?php

use App\MatrixEncryptionProvider;
use PHPUnit\Framework\TestCase;

class MatrixEncryptionTest extends TestCase
{

    /** @test */
    public function it_can_encrypt(){

        $data = 'h';

        $matrixEncrypter = new MatrixEncryptionProvider;

        $encryptedData = $matrixEncrypter->encrypt($data);

        // Complete the implementation.
        $this->assertEquals(Array(), $encryptedData['h']);

    }

}

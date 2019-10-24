<?php

use App\ShiftEncryptionProvider;
use PHPUnit\Framework\TestCase;

class ShiftEncryptionTest extends TestCase
{

    /** @test */
    public function it_can_encrypt(){

        $data = 'hello world';

        $shiftEncrypter = new ShiftEncryptionProvider(3);

        $encryptedData = $shiftEncrypter->encrypt($data);

        $this->assertEquals('khoor zruog', $encryptedData);

    }

}

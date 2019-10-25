<?php

use App\Helper;
use App\ShiftEncryptionProvider;
use PHPUnit\Framework\TestCase;

class ShiftEncryptionTest extends TestCase
{

    /** @test */
    public function it_can_encrypt(){

        $data = 'hello world';

        $helper = new Helper();

        $shiftEncrypter = new ShiftEncryptionProvider($helper);

        $encryptedData = $shiftEncrypter->encrypt($data);

        $this->assertEquals('khoor zruog', $encryptedData);

        $decryptedDate = $shiftEncrypter->decrypt($encryptedData);

        $this->assertEquals($decryptedDate, $data);

    }

}

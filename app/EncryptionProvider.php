<?php

namespace App;

interface EncryptionProvider{

    public function encrypt($data);

    public function decrypt($data);

}
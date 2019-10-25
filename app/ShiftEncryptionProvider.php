<?php

namespace App;

use App\Helper;

require_once ('EncryptionProvider.php');
require_once ('Helper.php');


/**
 * ShiftEncryptionProvider
 *
 * @author M Khaled Badenjki <m.k.badenjki@gmail.com>
 * @copyright This code is part of the recruitment process for Robusta Studios, Cairo, Egypt.
 */

class ShiftEncryptionProvider implements EncryptionProvider
{

    /**
     * @var
     * the amount of data shifted on encryption
     */
    private $SHIFT_AMOUNT;

    public $helper;


    /**
     * ShiftEncryptionProvider constructor.
     * @param $shift
     */
    public function __construct($helper)
    {

        $this->helper = $helper;

        $this->SHIFT_AMOUNT = $this->helper->config['SHIFT_AMOUNT'];

    }

    /**
     * @param $data
     * @return string
     */
    public function encrypt($data){

        return $this->helper->shiftLetters($this->SHIFT_AMOUNT, $data);

    }

    /**
     * @param $data
     * @return string
     */
    public function decrypt($data){

        return $this->helper->shiftLetters( - $this->SHIFT_AMOUNT, $data);

    }
}
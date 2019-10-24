<?php

namespace App;

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
    protected $shift;


    /**
     * ShiftEncryptionProvider constructor.
     * @param $shift
     */
    public function __construct($shift)
    {

        $this->shift = $shift;

    }

    /**
     * @param $data
     * @return string
     */
    public function encrypt($data){

        $distance = $this->shift % 26;

        $data = strtolower($data);

        $result = array();

        $characters = str_split($data);

        if ($distance < 0) {

            $distance += 26;

        }

        foreach ($characters as $idx => $char) {

            if ($char == ' '){

                $result[$idx] = ' ';

                continue;
                
            }

            $result[$idx] = chr(97 + (ord($char) - 97 + $distance) % 26);

        }

        return join("", $result);

    }

}
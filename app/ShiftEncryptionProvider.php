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
    public function __construct($shift = 0)
    {

        $this->shift = $shift;

    }

    /**
     * @param $data
     * @param $shift
     * @return string
     */
    public function encrypt($data, $shift = 0){

        $distance = $shift ? $shift % 26 : $this->shift % 26;

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

    /**
     * @param $data
     * @param $shift
     * @return string
     */
    public function decrypt($data, $shift = 0)
    {
        // TODO: Implement decrypt() method.

        $shift = $shift ? - $shift : - $this->shift;

        return $this->encrypt($data, $shift);

    }
}
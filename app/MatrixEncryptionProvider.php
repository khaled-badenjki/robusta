<?php

namespace App;

use App\Helper;

class MatrixEncryptionProvider implements EncryptionProvider
{

    public $helper;

    private $ENCODED_STRING_SIZE;

    private $ENCODED_SEPARATOR;

    // Encryption Key Matrix, provided by the example. Will be moved to a separate file soon
    /**
     * @var array
     */
    private $ENC_MATRIX;

    // Inverse Matrix, will be used for the decryption mechanism
    /**
     * @var array
     */
    private $DEC_MATRIX;

    public function __construct($helper)
    {

        $this->helper = $helper;

        $this->ENC_MATRIX = $this->helper->config['ENC_MATRIX'];

        $this->DEC_MATRIX = $this->helper->config['DEC_MATRIX'];

        $this->ENCODED_STRING_SIZE = $this->helper->config['ENCODED_STRING_SIZE'];

        $this->ENCODED_SEPARATOR = $this->helper->config['ENCODED_SEPARATOR'];

    }

    /**
     * @param $data
     * @return string
     */
    public function encrypt($data)
    {

        $encodedString = '';

        $encodedArray = array();

        foreach (str_split($data) as $char){

            $encodedArray[$char] = $this->helper->matrixMultiplication($this->helper->charToBinaryArray($char), $this->ENC_MATRIX);

            $encodedString .= implode($this->ENCODED_SEPARATOR, $encodedArray[$char][0]) . $this->ENCODED_SEPARATOR;

        }

        return $encodedString;

    }

    public function decrypt($data)
    {
        // TODO: Implement decrypt() method.

        $decodedArray = array();

        $str = '';

        if(substr($data,-1) == $this->ENCODED_SEPARATOR) {$data = substr($data, 0, -1);}

        // divide the string of numbers into chunks of size ENCODED_STRING_SIZE;
        $encodedArray = array_chunk(array_map('intval', explode ($this->ENCODED_SEPARATOR, $data)), $this->ENCODED_STRING_SIZE);

        $index = 0;

        foreach ($encodedArray as $char){

            $decodedArray[$index] = $this->helper->matrixMultiplication(array($char), $this->DEC_MATRIX, true);

            $decodedChar = $decodedArray[$index];

            $str .= chr(bindec(implode('', $decodedChar[0])));

            $index++;


        }

        return $str;

    }
}
<?php


namespace App;

use App\Helper;

require_once ('EncryptionProvider.php');
require_once ('Helper.php');

/**
 * Class ReverseEncryptionProvider
 * @package App
 */
class ReverseEncryptionProvider implements EncryptionProvider
{

    /**
     * @var mixed
     */
    private $ENCODE_URL;

    private $DECODE_URL;

    /**
     * @var
     */
    public $helper;

    /**
     * ReverseEncryptionProvider constructor.
     * @param $helper
     */
    public function __construct($helper)
    {

        $this->helper = $helper;

        $this->ENCODE_URL = $helper->config['ENCODE_URL'];

        $this->DECODE_URL = $helper->config['DECODE_URL'];


    }

    /**
     * @param $data
     * @return mixed
     */
    public function encrypt($data)
    {

        return $this->helper->consumeApi($this->ENCODE_URL, $data);

    }

    public function decrypt($data)
    {

        return $this->helper->consumeApi($this->DECODE_URL, $data);

    }

}
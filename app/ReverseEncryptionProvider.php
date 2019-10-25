<?php


namespace App;

class ReverseEncryptionProvider implements EncryptionProvider
{

    private $ENCODE_URL = 'http://backendtask.robustastudio.com/encode';

    private $DECODE_URL = 'http://backendtask.robustastudio.com/decode';

    public function __construct()
    {
    }

    public function encrypt($data)
    {

        return $this->consumeApi($this->ENCODE_URL, $data);

    }

    public function decrypt($data)
    {

        return $this->consumeApi($this->DECODE_URL, $data);

    }

    public function consumeApi($url, $data){

        $postData = array(
            'string' => $data,
        );

        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/json\r\n",
                'content' => json_encode($postData)
            )
        ));

        $response = file_get_contents($url,FALSE, $context);

        if ($response === FALSE){
            echo "Something went wrong.";

            exit();

        }

        return json_decode($response)->string;

    }

}
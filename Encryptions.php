<?php

class Encryptions
{
    
    private $key;

    private $iv;

    public function __construct() {

        $this->key = '416181$VTVaLeT13';

        $this->iv = 'LBVWAHVALPAREBIO';

    }

    public static function encrypt_cbc($str) {

        //$key = $this->hex2bin($key);
        $_this = new self;   

        $iv = $_this->iv;

        $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);

        mcrypt_generic_init($td, $_this->key, $iv);

        $encrypted = mcrypt_generic($td, $str);

        mcrypt_generic_deinit($td);

        mcrypt_module_close($td);

        return bin2hex($encrypted);

    }

    public static function decrypt_cbc($code) {

        //$key = $this->hex2bin($key);

        $_this = new self;

        $code = self::hex2bin($code);

        $iv = $_this->iv;

        $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv);

        mcrypt_generic_init($td, $_this->key, $iv);

        $decrypted = mdecrypt_generic($td, $code);

        mcrypt_generic_deinit($td);

        mcrypt_module_close($td);

        return utf8_encode(trim($decrypted));

    }

    protected static function hex2bin($hexdata) {

        $bindata = '';

        for ($i = 0; $i < strlen($hexdata); $i += 2) {

            $bindata .= chr(hexdec(substr($hexdata, $i, 2)));

        }

        return $bindata;

    }  
    

}
 
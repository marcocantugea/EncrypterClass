<?php
/*
 * Copyright (C) 2018 Marco Cantu Gea
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * Description of EncriptFunctions
 *
 * Esta clase se encarga de encriptar cadenas de texto.
 * 
 * @author Marco Cantu Gea
 */

class EncryptFunctions {
    
    private $key;
    private $keysize;
    private $message;
    private $iv_size;
    private $iv;
    
    function __construct($LlaveinStr) {
        if(!empty($LlaveinStr)){
            $this->key=pack('H*',  $this->strToHex($LlaveinStr));
            $this->keysize=  strlen($this->key);
            $this->iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
            $this->iv= mcrypt_create_iv($this->iv_size,MCRYPT_RAND);
        }
    }
    
    public function SetMessage($message){
        $this->message=$message;
    }
    
    public function GetEncryptMessage(){
        $ciphertext;
        $str_to_return="";
        if(!empty($this->keysize) && $this->keysize==32){
            $ciphertext= mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $this->message, MCRYPT_MODE_CBC,  $this->iv);
            $ciphertext=  $this->iv.$ciphertext;
            $str_to_return=  base64_encode($ciphertext);
        }else{
            $str_to_return=false;
        }
        return $str_to_return;
    }
    
    public function GetDecryptedMessage(){
        $cipheredtext;
        $str_to_return="";
        if(!empty($this->keysize) && $this->keysize==32){
            $cipheredtext=  base64_decode($this->message);
            $iv_dec= substr($cipheredtext, 0,  $this->iv_size);
            $message_cy=substr($cipheredtext, $this->iv_size);
            
            $str_to_return=mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $message_cy, MCRYPT_MODE_CBC, $iv_dec);
        }else{
            $str_to_return=false;
        }
        
        return $str_to_return;
    }
    
    protected function strToHex($string){
        $hex = '';
        for ($i=0; $i<strlen($string); $i++){
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0'.$hexCode, -2);
        }
        return strToUpper($hex);
    }
    
    protected function hexToStr($hex){
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2){
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }
    
}

<?php namespace App\Helpers;

use Mailgun\Mailgun;

class MailHelper {

    private $credentials = [
        'MAILGUN'=>[
            'API_base_url' 	=> 'https://api.mailgun.net/v3/sandboxcd58c8e5d64b4a6e927592381ae2cce9.mailgun.org',
            'API_key' 		=> 'key-8q6riminrgk6e2o3qg9j56m9-7hihod9',
            'API_Signature' 		=> 'AiPC9BjkCyDFQXbSkoZcgqH3hpacAgWr0WDgbsYxdzNXJJjOfJEKOD7T'
        ]];
    private $mg;

    function __construct(){
            $this->mg = new Mailgun($this->credentials['MAILGUN']['API_key']);
    }

    function send($from, $to, $subject, $body){
        $mail = ['from'=>$from, 'to'=>$to, 'subject'=>$subject, 'html'=>$body];
        try{
            $result = $this->mg->sendMessage($this->credentials['MAILGUN']['API_base_url'],$mail,[]);
            $result = (int)$result->http_response_code != 200;
        }catch(\Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters $e ){
            throw $e;
        }
    }
}
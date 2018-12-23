<?php

namespace Arifsajal\MobireachSmsGateway\Services;

use GuzzleHttp\Client;

class MobireachServices
{
    protected $config;

    protected $username;

    protected $password;

    protected $fullApiUrl = "https://api.mobireach.com.bd";

    protected $apiPath = ['single'=>'SendTextMessage','multiple'=>'SendTextMultiMessage'];

    protected $currentApiPath;

    protected $contacts;

    protected $message;

    protected $contactsString;

    protected $sender;

    protected $apiResponse;

    protected $formattedServerResponse;

    public function contacts($contacts){
        if(is_string($contacts)):
            $this->contacts = $contacts;
        elseif(is_array($contacts)):
            $this->contacts = $contacts;
        endif;

        if(is_array($contacts) && count($contacts) > 0):
            $string = "";
            foreach($contacts as $contact):
                $string .= $contact.',';
            endforeach;
            $this->contactsString = str_replace('+','',rtrim($string,','));
        else:
            $this->contactsString = str_replace('+','',$contacts);
        endif;

        return $this;
    }

    public function message($message){
        if($message):
            $this->message = $message;
        endif;
        return $this;
    }

    public function sender($sender){
        if($sender):
            $this->sender = $sender;
        endif;
        return $this;
    }

    public function send(){
        $queries = ['To'=>$this->contactsString,'Message'=>$this->message,'Username'=>$this->username,'Password'=>$this->password,'From'=>$this->sender];
        $client = new Client();

        if(count($this->contacts) > 1):
            $this->currentApiPath = $this->apiPath['multiple'];
        elseif(count($this->contacts) > 0 && count($this->contacts) == 1):
            $this->currentApiPath = $this->apiPath['single'];
        endif;

        $response = $client->request('GET',$this->fullApiUrl."/".$this->currentApiPath,['query'=>$queries]);
        $this->apiResponse = ['statusCode'=>$response->getStatusCode(),'reasonPhrase'=>$response->getReasonPhrase(),'serverResponse'=>$response->getBody()->getContents()];
        return $this;
    }

    public function config($array){
        $this->__setConfig($array);
        return $this;
    }

    public function formatServerResponse(){
        return json_decode(json_encode(simplexml_load_string($this->apiResponse['serverResponse'])))->ServiceClass;
    }

    protected function __setConfig($array){
        if(array_key_exists('username',$array) && array_key_exists('password',$array)):
            $this->config = $array;
            $this->username = $array['username'];
            $this->password = $array['password'];

            if(array_key_exists('full_api_url',$array)):
                $this->fullApiUrl = $array['full_api_url'];
            endif;

            if(array_key_exists('api_paths',$array)):
                $this->apiPath = $array['api_paths'];
            endif;
        endif;
        return $this;
    }
}
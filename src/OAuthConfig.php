<?php

namespace Salesforce;

class OAuthConfig {

    private $config;

    private $name;

    private $default;

    private $sandbox;

    private $clientId;

    private $clientSecret;

    private $callbackUrl;

    private $tokenUrl;

    private $authorizationCode;


    public function __construct($config){

        $this->config = $config;
        $this->name = $config["name"];
        $this->default = $config["default"];
        $this->sandbox = $config["sandbox"];
        $this->clientId = $config["client_id"];
        $this->clientSecret = $config["client_secret"];
        $this->tokenUrl = $config["token_url"];
    }

    public function getFlowConfig($flow = "usernamepassword"){

        $flowConfigs = $this->config["auth"]["oauth"];

        switch($flow){
            
            case "usernamepassword":
                $tmp = array(
                    "username" => $flowConfigs["usernamepassword"]["username"],
                    "password" => $flowConfigs["usernamepassword"]["password"],
                    "securityToken" => $flowConfigs["usernamepassword"]["security_token"]
                );
                break;
            case "webserver":
                $tmp = array(
                    "auth_url" => $flowConfigs["webserver"]["auth_url"],
                    "redirect_url" => $flowConfigs["webserver"]["redirect_url"],
                    "callback_url" => $flowConfigs["webserver"]["callback_url"]
                );
                break;

        }

        return new OAuthFlowConfig($tmp);

    }

    public function getName(){

        return $this->name;
    }

    public function getClientId(){

        return $this->clientId;
    }

    public function getClientSecret(){

        return $this->clientSecret;
    }

    public function getTokenUrl(){

        return $this->tokenUrl;
    }

    public function getConfig(){

        return $this->config;
    }

    public function getAuthorizationCode(){

        return $this->authorizationCode;
    }

    public function setAuthorizationCode($code){

        $this->authorizationCode = $code;
    }
}
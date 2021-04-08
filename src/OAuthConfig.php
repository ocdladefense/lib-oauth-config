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

        switch($flow){
            
            case "usernamepassword":
                $tmp = array(
                    "username" => $this->config["auth"]["oauth"]["usernamepassword"]["username"],
                    "password" => $this->config["auth"]["oauth"]["usernamepassword"]["password"],
                    "securityToken" => $this->config["auth"]["oauth"]["usernamepassword"]["security_token"]
                );
                break;
            case "webserver":
                $tmp = array(
                    "auth_url" => $this->config["auth"]["oauth"]["webserver"]["auth_url"],
                    "auth_redirect_url" => $this->config["auth"]["oauth"]["webserver"]["auth_redirect_url"],
                    "final_redirect_url" => $this->config["auth"]["oauth"]["webserver"]["final_redirect_url"]
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
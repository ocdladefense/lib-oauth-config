<?php

class OAuthConfig {

    private static $config;

    private $name;

    private $default;

    private $clientId;

    private $clientSecret;

    private $authorizationCode;


    public function __construct($config){

        self::$config = $config;
        $this->name = $config["name"];
        $this->default = $config["default"];
        $this->sandbox = $config["sandbox"];
        $this->clientId = $config["client_id"];
        $this->clientSecret = $config["client_secret"];
    }

    public function getFlowConfig($name = "usernamepassword", $domain = "default"){

        $config = self::parseFlowConfig($name, $domain);

        $flow = new OAuthFlowConfig($config);
        $flow->setName($name);
        $flow->setDomain($domain);

        return $flow;
    }

    public static function parseFlowConfig($name = "usernamepassword", $domain = "default") {

        $flowConfigs = self::$config["auth"]["oauth"];

        return $flowConfigs[$name][$domain];

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
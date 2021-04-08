<?php

namespace Salesforce;

class OAuthFlowConfig {

    private $username;

    private $password;

    private $securityToken;

    private $tokenUrl;

    private $authorizationUrl;

    private $redirectUrl;

    private $callbackUrl;

    public function __construct($config){

        $this->username = $config["username"];
        $this->password = $config["password"];
        $this->securityToken = $config["securityToken"];
        $this->authorizationUrl = $config["auth_url"];
        $this->redirectUrl = $config["redirect_url"];
        $this->callbackUrl = $config["callback_url"];
        $this->tokenUrl = $config["token_url"];
    }


    public function getUsername(){

        return $this->username;
    }

    public function getPassword(){

        return $this->password;
    }

    public function getSecurityToken(){

        return $this->securityToken;
    }

    public function getPasswordWithSecurityToken(){

        return $this->password . $this->securityToken;
    }

    public function getAuthorizationUrl(){

        return $this->authorizationUrl;
    }

    public function getAuthorizationRedirect(){

        return $this->redirectUrl;
    }

    public function getCallbackUrl(){

        return $this->callbackUrl;
    }

    public function getTokenUrl(){

        return $this->tokenUrl;
    }
}
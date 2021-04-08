<?php

namespace Salesforce;

class OAuthFlowConfig {

    private $username;

    private $password;

    private $securityToken;

    private $authorizationUrl;

    private $authorizationRedirectUrl;

    private $callbackUrl;

    public function __construct($config){

        $this->username = $config["username"];
        $this->password = $config["password"];
        $this->securityToken = $config["securityToken"];
        $this->authorizationUrl = $config["auth_url"];
        $this->authorizationRedirectUrl = $config["auth_redirect_url"];
        $this->callbackUrl = $config["final_redirect_url"];
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

        return $this->authorizationRedirectUrl;
    }

    public function getCallbackUrl(){

        return $this->callbackUrl;
    }
}
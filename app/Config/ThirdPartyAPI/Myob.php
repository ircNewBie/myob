<?php

namespace Config\ThirdPartyAPI;


use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\DotEnv;

class Myob extends BaseConfig

{
    public $clientID;
    public $clientSecret;
    public $accessToken;
    public $redirectURI;
    public $baseURI;
    public $scopes;


    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__);
        $dotenv->load();

        $this->scopes = 'CompanyFile la.global';

        // Get the values from the .env file
        $this->clientID = $_ENV['MYOB_API_KEY'];
        $this->clientSecret = $_ENV['MYOB_API_SECRET'];
        $this->baseURI = $_ENV['MYOB_BASE_URI'];
        $this->redirectURI = $_ENV['MYOB_REDIRECT_URI'];
    }
}

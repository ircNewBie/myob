<?php

namespace Config\ThirdPartyAPI;


use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\DotEnv;

class Myob extends BaseConfig

{
    private $clientID;
    private $redirectURI;
    private $scopes;

    public $clientSecret;
    public $accessToken;
    public $baseURI;
    public $queryParams;
    public $identityConnectURL;
    public $tokenRequestParams;
    public $authorization;


    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__);
        $dotenv->load();

        $this->scopes = 'CompanyFile la.global';
        $this->identityConnectURL = $_ENV['MYOB_IDENTITY_CONNECT_URI'];


        // Get the values from the .env file
        $this->clientSecret = $_ENV['MYOB_API_SECRET'];
        $this->baseURI = $_ENV['MYOB_BASE_URI'];

        $clientID = $_ENV['MYOB_API_KEY'];
        $redirectURI = $_ENV['REDIRECT_URI'];
        $scopes =  'CompanyFile';


        $this->queryParams = [
            'response_type' => 'code',
            'client_id' => $clientID,
            'redirect_uri' => $redirectURI,
            'scope' => $scopes
        ];

        $this->authorization = "Basic " . '$this->base64Encode($clientID . ":" . $this->clientSecret)';
        $this->tokenRequestParams = [
            'grant_type' => 'authorization_code',
            'client_id' => $clientID,
            'code' => '',
            'redirect_uri' => $redirectURI,
            'client_secret' => $this->clientSecret
        ];
    }
}

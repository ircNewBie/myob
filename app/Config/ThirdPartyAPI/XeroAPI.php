<?php

namespace Config\ThirdPartyAPI;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\DotEnv;

class XeroAPI extends BaseConfig
{
    private $clientID;
    private $redirectURI;
    private $scopes;

    public $clientSecret;
    public $accessToken;
    public $baseURI;
    public $queryParams;

    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__);
        $dotenv->load();

        // Get the values from the .env file
        $this->clientSecret = $_ENV['XERO_CLIENT_SECRET'];
        $this->baseURI = $_ENV['XERO_BASE_URI'];

        $clientID = $_ENV['XERO_CLIENT_ID'];
        $redirectURI = $_ENV['XERO_REDIRECT_URI'];
        $scopes =  'accounting.transactions';

        $this->queryParams = [
            'response_type' => 'code',
            'client_id' => $clientID,
            'redirect_uri' => $redirectURI,
            'scope' => $scopes
        ];
    }
}

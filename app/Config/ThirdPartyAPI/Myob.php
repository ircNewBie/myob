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



    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__);
        $dotenv->load();

        $this->scopes = 'CompanyFile la.global';

        // Get the values from the .env file
        $this->clientSecret = $_ENV['MYOB_API_SECRET'];
        $this->baseURI = $_ENV['MYOB_BASE_URI'];

        $clientID = $_ENV['MYOB_API_KEY'];
        $redirectURI = $_ENV['MYOB_REDIRECT_URI'];
        $scopes =  'CompanyFile la.global';


        $this->queryParams = [
            'response_type' => 'code',
            'client_id' => $clientID,
            'redirect_uri' => $redirectURI,
            'scope' => $scopes
        ];
    }
}

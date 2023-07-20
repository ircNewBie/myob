<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Config\DotEnv;

class Myob extends BaseConfig
{
    public $clientID = 'your-client-id';
    public $clientSecret = 'your-client-secret';
    public $accessToken = 'your-access-token';
    public $redirectURI = "test";
    public $baseURI = "test";
}

// class XeroAPI extends BaseConfig
// {
//     public $clientID;
//     public $clientSecret;
//     public $redirectURI;
//     public $baseURI;

//     public function __construct()
//     {
//         $dotenv = new Dotenv(__DIR__);
//         $dotenv->load();


//         // Get the values from the .env file
//         $this->clientID = $_ENV['XERO_CLIENT_ID'];
//         $this->clientSecret = $_ENV['XERO_CLIENT_SECRET'];
//         $this->baseURI = $_ENV['XERO_BASE_URI'];
//         $this->redirectURI = $_ENV['XERO_REDIRECT_URI'];

//         echo ($this->clientID);
//     }
// }

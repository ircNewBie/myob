<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Myob extends BaseConfig
{
    public $clientID = 'your-client-id';
    public $clientSecret = 'your-client-secret';
    public $accessToken = 'your-access-token';
    public $redirectURI = "test";
    public $baseURI = "test";
}

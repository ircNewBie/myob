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
    public $identityConnectURL;
    public $tokenRequestParams;
    public $authorization;


    public function __construct()
    {
        $dotenv = new Dotenv(__DIR__);
        $dotenv->load();

        // Get the values from the .env file
        $this->clientSecret = $_ENV['XERO_CLIENT_SECRET'];
        $this->baseURI = $_ENV['XERO_BASE_URI'];
        $this->identityConnectURL = $_ENV['XERO_IDENTITY_CONNECT_URI'];

        $clientID = $_ENV['XERO_CLIENT_ID'];
        $redirectURI = $_ENV['REDIRECT_URI'];
        $scopes =  'openid profile email accounting.transactions';
        $codeVerifier = $this->generateCodeVerifier(43);
        $codeChallenge =  $this->generateCodeChallenge($codeVerifier);

        $this->queryParams = [
            'response_type' => 'code',
            'client_id' => $clientID,
            'redirect_uri' => $redirectURI,
            'state' => "xero-api-access",
            'code_challenge' => $codeChallenge,
            'code_challenge_method' => 'S256',
            'scope' => $scopes
        ];


        // Authorization: "Basic " + base64encode(client_id + ":" + client_secret)
        // grant_type=authorization_code
        // client_id=The client ID of your app
        // code=The authorization code you received in the callback
        // redirect_uri=The same redirect URI that was used when requesting the code
        // code_verifier=The code verifier that you created during the authorization step
        $this->authorization = "Basic " . $this->base64Encode($clientID . ":" . $this->clientSecret);
        $this->tokenRequestParams = [
            'grant_type' => 'authorization_code',
            'client_id' => $clientID,
            'code' => '',
            'redirect_uri' => $redirectURI,
            'code_verifier' => $codeVerifier
        ];
    }


    private function generateCodeVerifier($length)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~';
        $codeVerifier = '';
        $characterCount = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $codeVerifier .= $characters[random_int(0, $characterCount)];
        }

        return $codeVerifier;
    }


    private function base64Encode($data)
    {
        return base64_encode($data);
    }

    private function generateCodeChallenge($codeVerifier)
    {
        $sha256Verifier = hash('sha256', $codeVerifier, true);

        return $this->base64Encode($sha256Verifier);
    }
}

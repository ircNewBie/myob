<?php

namespace App\Controllers;

use App\Service\InvoiceService;

use CodeIgniter\Controller;

use Config\ThirdPartyAPI\Myob;
use Config\ThirdPartyAPI\XeroAPI;


class APIController extends Controller
{
    private $apiConfig;

    public function __construct()
    {
        $xeroApiConfig = new XeroAPI();
        $myobApiConfig =  new Myob();

        // -- uncomment to enable below settings.
        $this->apiConfig =  $xeroApiConfig;
        // $this->apiConfig =  $myobApiConfig;
    }

    public function openAPIAuthorizationRequest()
    {
        $clientID = $this->apiConfig->clientID;
        $redirectURI = $this->apiConfig->redirectURI;
        $baseUri = $this->apiConfig->baseURI;
        $scopes = $this->apiConfig->scopes;

        // Query parameters for the request
        $queryParams = [
            'response_type' => 'code',
            'client_id' => $clientID,
            'redirect_uri' => $redirectURI,
            'scope' => $scopes
        ];

        // Construct the full URL
        $url = $baseUri . 'authorize?' . http_build_query($queryParams);

        // Use the `exec()` function to open the URL in the default web browser
        exec('open ' . escapeshellarg($url));

        // Return a success message or anything else you might want to display
        return 'Authorization request has been opened in your default web browser.';
    }


    public function getAPIAuthorizationCode()
    {
        $code = $this->request->getVar('code');

        return $this->response->setJSON([
            'message' => 'Your authorization code request.',
            'code' => $code
        ]);
    }



    public function retrieveInvoices()
    {

        $invoiceService = new InvoiceService($this->apiConfig);

        $response = $invoiceService->getInvoices();

        return $this->response->setJSON($response);
    }
}

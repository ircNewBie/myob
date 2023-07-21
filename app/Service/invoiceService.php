<?php

namespace App\Service;

class InvoiceService
{
    private $clientID;
    private $clientSecret;
    private $accessToken;
    private $baseURI;


    public function __construct($apiConfig)
    {
        $this->clientID = $apiConfig->clientID;
        $this->clientSecret = $apiConfig->clientSecret;
        $this->baseURI = $apiConfig->baseURI;
    }


    public function getInvoices()
    {
        // Implement your logic for retrieving invoices from MYOB API
        // Example: Make API requests using the Myob configuration


        // Make API requests, process the response, and return the invoices

        // Placeholder response for demonstration
        $invoices = [
            ['creds' => [
                'clientID' => $this->clientID,
                'clientSecret' => $this->clientSecret,
                'clientBaseURI' => $this->baseURI
            ]],

            ['id' => 1, 'number' => 'INV-001', 'amount' => 100.00],
            ['id' => 2, 'number' => 'INV-002', 'amount' => 200.00],
            ['id' => 3, 'number' => 'INV-003', 'amount' => 300.00]
        ];

        return $invoices;
    }
}

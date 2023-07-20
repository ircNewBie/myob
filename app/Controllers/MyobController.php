<?php

namespace App\Controllers;

use App\Service\InvoiceService;
use CodeIgniter\Controller;
use Config\Myob;
use Config\ThirdPartyAPI\XeroAPI;

class MyobController extends Controller
{

    public function retrieveInvoices()
    {
        $xeroAPIConfig = new XeroAPI();
        $myobAPIConfig = new Myob();

        $invoiceService = new InvoiceService($xeroAPIConfig);

        // Implementation for retrieving invoices from MYOB API
        // Example: $invoices = $this->myob->getInvoices();
        // You can replace the example code with your actual integration logic
        // Return the response, e.g., using JSON
        $response = $invoiceService->getInvoices();

        return $this->response->setJSON($response);
    }
}

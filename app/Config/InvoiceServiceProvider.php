<?php

namespace App\Config;

use App\Service\InvoiceService;
use CodeIgniter\Config\BaseService;
use Config\Myob;

class InvoiceServiceProvider extends BaseService
{
    public static function getInstance($config = null)
    {
        $myobConfig = new Myob();
        return new InvoiceService($myobConfig);
    }
}

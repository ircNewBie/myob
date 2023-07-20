<?php

namespace Tests\Feature;

use CodeIgniter\Test\FeatureTestCase;

use function PHPUnit\Framework\assertNotEquals;

class MyobControllerTest extends FeatureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Perform any necessary setup here, such as loading fixtures
    }


    public function test_get_retrieveInvoices_valid_uri()
    {
        // Write your test case for the retrieveInvoices method here
        $result = $this->get('/myob/retrieve-invoices');

        // Assert that the response status is not 404
        $result->assertStatus(404);
    }
}

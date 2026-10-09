<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();
        $customers = $customerModel->findAll();

        return view('partials/header', ['title' => 'Customer Accounts'])
            . view('customers/index', ['customers' => $customers])
            . view('partials/footer');
    }
}

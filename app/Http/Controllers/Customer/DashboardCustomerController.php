<?php


namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class DashboardCustomerController extends Controller
{
    public function index() {
        return view('customer.dashboard.dashboard');
    }
}


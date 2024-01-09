<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer(Request $req){
        return view('admin.customer.list');
    }

    public function addCustomer(Request $req){
        echo "ADD"; die();
    }
}

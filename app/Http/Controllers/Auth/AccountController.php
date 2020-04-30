<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //\
     protected function create(array $data)
    {
        return Account::create([
            'amount' => $data['amount'],
            'charges' => $data['charges'],
            'tax' => $data['tax'],
            'email' => $data['email'],
        ]);
    }

      public function __construct()
    {
        $this->middleware('guest');
    }
}

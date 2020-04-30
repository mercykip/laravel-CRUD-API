<?php

namespace App\Http\Controllers\Api;
use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccController extends Controller
{
    public function accounts()
    {
        
       return Account::all();
    }
    
    public function account($id)
    {
          $data = [
            'success' => true,
            'message' => 'Order has been asigned'
        ];
    
       // return response()->json($data);
       $account=Account::find($id);
       return response()->json($account);
    }

       public function accountBalance($id)
    {
      $account = DB::table('accounts')
         ->where('user_id', '=', $request->get('account'))
         ->value('id');
    $account=new Account();
    $account->total = ($request->get('subscription'))+$amount;
    $account->account_id = $account;
    $accountsave();
       // return response()->json($data);
       $account=Account::find($id);
       
       return response()->json($account);
    }


  
}
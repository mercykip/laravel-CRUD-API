<?php

namespace App\Http\Controllers\Api;
use App\User;
use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Resources\User as UserResource;
//use App\Http\Resources\UserCollection;
 use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //S
    public function register(Request $request)
    {
       $validatedData = $request->validate([
       	'name'=>'required|max:55',
       	'email'=>'email|max:55|unique:users',
        'accountNumber'=>'required',
        'phoneNumber'=>'required',
        'gender'=>'required',
       	'password'=>'required|confirmed'

       ]);
       //$user->accounts->create(['amount'=>$data[0]]);
       $validatedData['password'] = bcrypt($request->password);
       $user = User::create($validatedData);
       $accessToken = $user->createToken('authToken')->accessToken;
       if(!$user){
         return response ("registration failed");
       }
       else{
         $account=new Account();
         $account->email= $user->email;
         $account->user_id=$user->user_id;
         $account->save();
       return response (['user'=>$user,'access_token'=>$accessToken]);
          }
  }


    public function login(Request $request)
    {
        $loginData = $request->validate
          ([
           'email'=>'email|required',
           'password'=>'required'

          ]);
        //check if it is valid data
        if(!auth()->attempt($loginData))
          {
            return response (['message'=>'Invalid credentials']);
          }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response (['user'=>auth()->user(),'access_token'=>$accessToken]);
    }

    public function users()
      {
     
         return User::all();
      }
    public function user($id){
      
      $user=User::find($id);
      
       return response()->json($user);
    }

    public function updateUser(Request $request,$id){
       $user=User::find($id);
       $user->email=$request->input("email");
       $user->password=$request->input("password");
       $user->save();
       return response()->json($user);
    }

    public function deleteUser($id){
         $user=User::find($id);//find user data
         $user->delete();
         return "user deleted successfully";
    }
}
<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
     use Notifiable, HasApiTokens;


 protected $table = 'accounts';


     protected $fillable = [
        'amount', 'charges','tax','user_id','email'
    ];

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }
}

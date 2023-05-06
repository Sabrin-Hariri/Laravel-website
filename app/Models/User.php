<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use App\Models\Profile;
//use Auth ;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table ='users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //اليوزر عندو بروفايل واحد 
   public function profile()
   {
  return $this->hasOne(Profile::class);

//\App\Models\User
  // return $this->hasOne(App::Profile);
//return $this->hasOne('\App\Profile' );

   }    
}

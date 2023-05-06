<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use delete;
use wasChanged;
use OnlyTrashed;

class Post extends Model
{     use softDeletes; 

    protected $datas = ['deleted_at '];
    // protected $table = 'posts';
    protected $fillable = [
        'content',
        'user_id',
        'title',
        'photo', 
        'slug'
    ];


    public function user()
    {
        //return $this->hasOne(\App\Models\Profile::class);
           
        //return $this->belongsTo(App::User, 'user_id');
        return $this->belongsTo('\App\Models\User' , 'user_id');
     
    }    
        
    public function getFeaturedAttribute($photo){
    return asset($photo);
    }

    public function tag()
    {
        return $this->belongsToMany('\App\Models\Tag' );
     
    }    
        
}
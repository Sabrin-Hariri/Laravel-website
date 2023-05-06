<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{  
    protected $fillable = ['tag '];


    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Role::posts);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    protected $fillable = ['user_id','title','author','description'];
}

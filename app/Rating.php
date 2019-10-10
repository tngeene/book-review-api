<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    protected $fillable = ['book_id','user_id','rating'];
}

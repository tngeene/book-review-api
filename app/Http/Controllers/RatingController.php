<?php

namespace App\Http\Controllers;
use App\Book;
use App\Rating;
use App\Http\Resources\RatingResource;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function store(Request $request, Book $book)
    {
        $rating = Rating::firstOrCreate(
            [
                'user_id' => $request->user()->id,
                'book_id' => $book->id,
            ],
            ['rating'=> $request->rating]
        );
        return new RatingResource($rating);
    }
}

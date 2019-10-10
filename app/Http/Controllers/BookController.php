<?php

namespace App\Http\Controllers;
use APP\Book;
use Tymon\JWTAuth\Facades\JWTAuth as TymonJWTAuth;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Resources\BookResource;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{


   public function __construct()
   {
   // $this->middleware('auth:api')->except(['index', 'show']);
   }
   
    /**
     * Display all books that have been added
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return BookResource::collection(Book::with('ratings')->paginate(25));
    }

    public function store(Request $request)
    {
      $book  = $request->isMethod('put') ? book::findOrFail($request->id) : new Book;
      $book->title = $request->input('title');
      $book->author  = $request->input('author');
      $book ->description = $request->input('description');
      $book->user_id = auth()->user()->id;
      $request->user()->books();

      if ($book->save()) {
          return new BookResource($book);
      }
      /*
      $book = new Book;
      $book->user_id = auth()->user()->id;
      $request->user()->books();
      $book->title = $request->title;
      $book->author = $request->author;
      $book->description = $request->description;
      $book->save();

      return new BookResource($book);
      */
    }

    public function show(Book $book)
    {
      return new BookResource($book);
    }

    public function update(Request $request, Book $book)
    {
      // check if currently authenticated user is the owner of the book
      if ($request->user()->id !== $book->user_id) {
        return response()->json(['error' => 'You can only edit your own books.'], 403);
      }

      $book->update($request->only(['title','author', 'description']));

      return new BookResource($book);
    }

    public function destroy(Book $book)
    {
      $book->delete();

      return response()->json(null, 204);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookCollection;

class BookGenrerController extends Controller
{
    public function index($genre_id)
    {
        $books = Book::get()->where('genre_id',$genre_id);
        if(is_null($books)){
            return response()->json('No books for selected genre!', 404);
        }
        return response()->json(new BookCollection($books));
    }
}

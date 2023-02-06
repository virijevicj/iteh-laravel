<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookCollection;

class BookAuthorController extends Controller
{
    public function index($author_id)
    {
        $books = Book::get()->where('author_id',$author_id);
        if(is_null($books)){
            return response()->json('No books for selected author!', 404);
        }
        return response()->json(new BookCollection($books));
    }
}

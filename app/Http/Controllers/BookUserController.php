<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookCollection;

class BookUserController extends Controller
{
    public function index($user_id)
    {
        $books = Book::get()->where('user_id',$user_id);
        if(is_null($books)){
            return response()->json('No books for selected user!');
        }
        return response()->json(new BookCollection($books));
    }
}

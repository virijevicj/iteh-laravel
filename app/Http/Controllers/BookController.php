<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return new BookCollection($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|String|max:255',
            'ISBN'=>'required|String|max:20',
            'year_of_publication'=>'numeric',
            'grade_'=>'digits_between:1,10',
            'author_id'=>'required|numeric',
            'genre_id'=>'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $book = Book::insert([
            'title'=>$request->title,
            'ISBN'=>$request->ISBN,
            'year_of_publication'=>$request->year_of_publication,
            'grade'=>$request->grade,
            'author_id'=>$request->author_id,
            'genre_id'=>$request->genre_id,
            'user_id'=>Auth::user()->id
        ]);

        return response()->json('Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator=Validator::make($request->all(),[
            'title'=>'required|String|max:255',
            'ISBN'=>'required|String|max:20',
            'year_of_publication'=>'numeric',
            'grade_'=>'digits_between:1,10',
            'author_id'=>'required|numeric',
            'genre_id'=>'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $book->title = $request->title;
        $book->ISBN = $request->ISBN;
        $book->year_of_publication = $request->year_of_publication;
        $book->grade = $request->grade ;
        $book->author_id = $request->author_id;
        $book->genre_id = $request->genre_id;

        $book->save();

        return response()->json('Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json('Book deleted successfully.');
    }

    
}

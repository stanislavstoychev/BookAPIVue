<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('genre')->orderBy('title')->get();
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'genre_id' => 'required',
            'code' => 'required',
            'title' => 'required',
            'author' => 'required',
           ]);

        $book = new Book();
        $book->code = $request->code;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre_id = $request->genre_id;
        $book->save();

        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with('genre')->findOrFail($id);
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'genre_id' => 'required',
            'code' => 'required',
            'title' => 'required',
            'author' => 'required',
           ]);

        $data = array();
        $data['code'] =  $request->code;
        $data['author'] =  $request->author;
        $data['title'] =  $request->title;
        $data['genre_id'] =  $request->genre_id;
        $book = Book::where('id',$id)->update($data);

        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Book::destroy($id);
        $book = Book::find($id);
        // if not set cascade in database or we work with soft delete
        //soft delete - get only deleted
        // Book::onlyTrashed()->get();
        //$book->rents()->restore()
        $book->rents()->delete(); 
        $book->delete();
        return response(null, Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
class BookController extends Controller
{

    public function index()
    {
        $books = Book::with('categories')->get();
        return response()->json($books);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
    
        $book = Book::create($request->all());
        
        // Attach categories if provided
        if ($request->has('categories')) {
            $book->categories()->attach($request->categories);
        }
    
        return response()->json($book, 201);
    }
    
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);
    
        $book->update($request->all());
    
        // Sync categories if provided
        if ($request->has('categories')) {
            $book->categories()->sync($request->categories);
        }
    
        return response()->json($book, 200);
    }
    
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, 204);
    }
    
}

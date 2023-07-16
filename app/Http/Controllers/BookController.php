<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request) {
        $keyword = null;
        $number = 10;

        $books = Book::whereHas('ratings')
                    ->withCount('ratings')
                    ->with(['author', 'category'])
                    ->orderBy('avg_rating', 'desc');

        if($request->keyword) {
            $keyword = $request->keyword;

            $books = $books->where('title', 'LIKE', '%' . $keyword . '%')
                        ->orWhereHas('author', function($query) use ($keyword) {
                            $query->where('name', 'LIKE', '%' . $keyword . '%');
                        });
        }

        if($request->number) {
            $number = $request->number;
        }

        $books = $books->take($number)->get();
        
        return view('index', ['books' => $books, 'keyword' => $keyword, 'number' => $number]);
    }

    public function author() {        
        $authors = Author::whereHas('ratings', function ($query) {
            $query->where('rating', '>', 5);
        })->withCount('ratings')
            ->orderBy('ratings_count', 'desc')
            ->take(10)
            ->get();

        return view('authors', ['authors' => $authors]);
    }
}

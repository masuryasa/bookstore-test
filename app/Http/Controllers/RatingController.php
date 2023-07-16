<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index() {
        $authors = Author::all();

        return view('rating', ['authors' => $authors]);
    }

    public function getBooks(Request $request) {
        $authorId = $request->author_id;

        $books = Author::find($authorId)->books;
        return $books;

        return response()->json($books);
    }

    private function updateAverage(float $average, int $numberData, int $newValue): float {
        $total = ($average * $numberData) + $newValue;
        $newAverage = $total / ($numberData + 1);
        return $newAverage;
    }

    public function postRating(Request $request) {
        $bookId = $request->book;
        $rate = $request->rating;
        
        $book = Book::find($bookId);
        $averageRating = $book->avg_rating;
        $count = $book->ratings->count();
        
        $rating = new Rating;
        $rating->rating = $rate;
        $rating->book_id = $bookId;
        $rating->save();

        $updateRating = $this->updateAverage($averageRating, $count, $rate);

        $book->avg_rating = $updateRating;
        $book->save();
        
        return redirect('/');
    }
}

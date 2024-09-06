<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Notifications\BookTransactionNotification;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function borrow(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        if ($book->status === 'available') {

            $book->update(['status' => 'borrowed']);

            auth()->user()->borrowedBooks()->attach($bookId, [
                'borrowed_at' => now(),
            ]);

            auth()->user()->notify(new BookTransactionNotification($book, 'borrowed'));

            return response()->json(['message' => 'Book borrowed successfully'], 200);
        } else {
            return response()->json(['message' => 'Book is not available'], 400);
        }
    }

    public function returnBook(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);
        if ($book->status === 'borrowed') {
            $book->update(['status' => 'available']);


            auth()->user()->borrowedBooks()->updateExistingPivot($bookId, [
                'returned_at' => now(),
            ]);
           auth()->user()->notify(new BookTransactionNotification($book, 'returned'));

            return response()->json(['message' => 'Book returned successfully'], 200);
        } else {
            return response()->json(['message' => 'Book is not currently borrowed'], 400);
        }
    }

}

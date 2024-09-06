<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BooksController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('author');


        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhereHas('author', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                });
        }

        $books = $query->paginate(10);

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'title' => 'required',
            'author_id' => 'exists:authors,id',
            'isbn' => 'required|unique:books',
            'published_at' => 'required|date',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

    public function show($id)
    {
        return Book::with('author')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {

        $validator = \Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required|string|unique:books,isbn,' . $id,
            'published_at' => 'required|date',
            'status' => 'required|in:available,borrowed',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(10);
        return response()->json($authors);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'birthdate' => 'required|date',
            'bio' => 'required',
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function show($id)
    {
        return Author::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required|date',
            'bio' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json(null, 204);
    }
}

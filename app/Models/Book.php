<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'books';
    protected $fillable = ['title', 'author_id', 'isbn', 'published_at', 'status'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrowed_books')
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }
}

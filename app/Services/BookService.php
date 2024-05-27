<?php 

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function createBook(array $data)
    {
        return Book::create($data);
    }

    public function updateBook($id, array $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return true;
        }
        return false;
    }
}

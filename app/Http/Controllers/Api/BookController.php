<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Services\BookService;
use App\Http\Requests\BookRequest;
use Exception;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return $this->successResponse(Book::all());
    }

    public function store(BookRequest $request)
    {
        try {
            return $this->successResponse($this->bookService->createBook($request->validated()));
        } catch(Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        return $this->successResponse(Book::find($id));
    }

    public function update(BookRequest $request, $id)
    {
        try {
            return $this->successResponse($this->bookService->updateBook($id, $request->validated()));
        } catch(Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            return $this->successResponse($this->bookService->deleteBook($id));
        } catch(Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}

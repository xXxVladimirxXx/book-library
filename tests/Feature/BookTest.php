<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_books()
    {
        Book::factory()->count(3)->create();
        $response = $this->get('/api/books');
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_create_book()
    {
        $bookData = [
            'title' => 'Test Book',
            'publisher' => 'Test Publisher',
            'author' => 'Test Author',
            'genre' => 'Test Genre',
            'publication_date' => '2023-01-01',
            'word_count' => 50000,
            'price' => 19.99
        ];

        $response = $this->post('/api/books', $bookData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('books', $bookData);
    }

    // Add tests for update and delete operations
}
<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_get_all_books(): void
    {
        Book::factory()->count(5)->create();

        $response = $this->getJson('/api/books');

        $response->assertStatus(200);
    }

    public function test_it_can_create_a_book(): void
    {
        $bookData = [
            'title' => 'Sample Book',
            'publisher' => 'Sample Publisher',
            'author' => 'Sample Author',
            'genre' => 'Fiction',
            'publication_date' => '2023-01-01',
            'word_count' => 10000,
            'price' => 19.99,
        ];

        $response = $this->postJson('/api/books', $bookData);

        $response->assertStatus(200)->assertJsonFragment($bookData);
    }

    public function test_it_validates_book_creation(): void
    {
        $response = $this->postJson('/api/books', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['title', 'publisher', 'author', 'genre', 'publication_date', 'word_count', 'price']);
    }

    public function test_it_can_update_a_book(): void
    {
        $book = Book::factory()->create();

        $updateData = [
            'title' => 'Updated Book Title',
            'publisher' => 'Sample Publisher',
            'author' => 'Sample Author',
            'genre' => 'Fiction',
            'publication_date' => '2023-01-01',
            'word_count' => 10000,
            'price' => 19.99,
        ];

        $response = $this->patchJson("/api/books/{$book->id}", $updateData);

        $response->assertStatus(200)->assertJsonFragment($updateData);
    }

    public function test_it_validates_book_update(): void
    {
        $book = Book::factory()->create();

        $response = $this->patchJson("/api/books/{$book->id}", ['title' => '']);

        $response->assertStatus(422)->assertJsonValidationErrors(['title']);
    }

    public function test_it_can_delete_a_book(): void
    {
        $book = Book::factory()->create();

        $response = $this->deleteJson("/api/books/{$book->id}");

        $response->assertStatus(200);
    }
}
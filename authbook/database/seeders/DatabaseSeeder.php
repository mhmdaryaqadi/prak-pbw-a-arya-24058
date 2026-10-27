<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin (Bisa semua akses)
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // 2. Akun Staff (Bisa create, edit, view - tidak bisa delete)
        User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'role' => 'staff',
        ]);

        // 3. Akun Viewer (Hanya bisa view)
        User::factory()->create([
            'name' => 'Viewer User',
            'email' => 'viewer@example.com',
            'role' => 'viewer',
        ]);

        // 4. Buat Categories
        $categories = collect([
            'Technology',
            'Fiction',
            'Science',
            'History',
            'Novel',
            'Programming',
        ])->map(function ($name) {
            return Category::create(['name' => $name]);
        });

        // 5. Buat 10 authors
        $authors = Author::factory(10)->create();

        // 6. Buat 50 books dengan random authors dan attach random categories
        $books = Book::factory(50)->create([
            'author_id' => fn() => $authors->random()->id,
        ]);

        $books->each(function ($book) use ($categories) {
            $book->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}

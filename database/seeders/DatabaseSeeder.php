<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Mahadi Saputra',
            'username' => 'mahadisaputra',
            'email' => 'me@mahadisaputra.my.id',
            'description' => "I'm Mahadi Saputra. A information system student at ITB STIKOM Bali & HELP University Malaysia who like to code (≧∀≦)ゞ",
            'password' => bcrypt('Pass1234!'),
            'role' => 'God',
        ]);

        // User::factory(10)->create();
        
        Category::create([
            'name' => 'Sharing',
            'slug' => 'sharing'
        ]);
        
        Category::create([
            'name' => 'Tips & Trick',
            'slug' => 'tips-n-trick'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        // Post::factory(20)->create();

        Post::create([
            'title' => 'Hello World!',
            'slug' => 'hello-world',
            'excerpt' => 'Hello World',
            'body' => 'Hello World! - Halo semuanya! Ini adalah kali pertama saya belajar Laravel, disini saya belajar menggunakan Laravel 10 dikombinasikan dengan Vite dan juga Tailwind kemudian di Tailwind juga saya menggunakan plugin component dari Flowbite. Dan tidak lupa, di halaman dashboard saya menggunakan template Bootstrap gratisan yang bernama StartBootstrap SB Admin 2.

            Saya membuat blog ini karena saya ingin sekali belajar Laravel, saya melihat tutorial di channel Youtube nya bang Web Programming UNPAS alias Bang Sandhika Galih. Saya melakukan banyak perubahan diantaranya UI, menambahkan banyak fitur juga! Terimakasih tutorialnya bang semoga ilmu nya bisa bermanfaat untuk saya 👋🙏',
            'category_id' => 1,
            'user_id' => 1
        ]);
    }
}

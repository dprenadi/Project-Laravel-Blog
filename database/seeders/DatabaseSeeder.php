<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Hayasaka Ai',
            'username' => 'ai_hayasaka',
            'email' => 'ai.hayasaka@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Arthuria Pendragon',
            'username' => 'pendragon',
            'email' => 'a.pendragon@gmail.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'Liscia Elfrieden',
            'username' => 'liscia_e',
            'email' => 'liscia@gmail.com',
            'password' => bcrypt('123456')
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        // 'title' => 'Judul 1',
        // 'category_id' => 1,
        // 'user_id' => 1,
        // 'slug' => 'judul-satu',
        // 'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium soluta voluptate modi, error a iusto?',
        // 'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia harum cumque et commodi tempora voluptatem aperiam eos aut ratione fugit officiis placeat quos est doloremque eum quis a ut velit, suscipit dolore perferendis quidem consectetur dolorum? Sunt, ducimus praesentium explicabo error, optio deserunt quisquam non unde recusandae repellendus veniam tempore?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam alias esse temporibus deleniti sit, cupiditate molestias, hic totam exercitationem beatae veritatis expedita atque ipsum quos neque fugit sed, ut error reiciendis. Maxime impedit consectetur et voluptate ullam unde voluptatibus ea fuga, sit quae eligendi sint iusto facere, accusamus voluptas repellendus.</p>'
        // ]);

        // Post::create([
        // 'title' => 'Judul 2',
        // 'category_id' => 1,
        // 'user_id' => 2,
        // 'slug' => 'judul-dua',
        // 'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium soluta voluptate modi, error a iusto?',
        // 'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia harum cumque et commodi tempora voluptatem aperiam eos aut ratione fugit officiis placeat quos est doloremque eum quis a ut velit, suscipit dolore perferendis quidem consectetur dolorum? Sunt, ducimus praesentium explicabo error, optio deserunt quisquam non unde recusandae repellendus veniam tempore?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam alias esse temporibus deleniti sit, cupiditate molestias, hic totam exercitationem beatae veritatis expedita atque ipsum quos neque fugit sed, ut error reiciendis. Maxime impedit consectetur et voluptate ullam unde voluptatibus ea fuga, sit quae eligendi sint iusto facere, accusamus voluptas repellendus.</p>'
        // ]);

        // Post::create([
        // 'title' => 'Judul 3',
        // 'category_id' => 2,
        // 'user_id' => 1,
        // 'slug' => 'judul-tiga',
        // 'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium soluta voluptate modi, error a iusto?',
        // 'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia harum cumque et commodi tempora voluptatem aperiam eos aut ratione fugit officiis placeat quos est doloremque eum quis a ut velit, suscipit dolore perferendis quidem consectetur dolorum? Sunt, ducimus praesentium explicabo error, optio deserunt quisquam non unde recusandae repellendus veniam tempore?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam alias esse temporibus deleniti sit, cupiditate molestias, hic totam exercitationem beatae veritatis expedita atque ipsum quos neque fugit sed, ut error reiciendis. Maxime impedit consectetur et voluptate ullam unde voluptatibus ea fuga, sit quae eligendi sint iusto facere, accusamus voluptas repellendus.</p>'
        // ]);

        // Post::create([
        // 'title' => 'Judul 4',
        // 'category_id' => 3,
        // 'user_id' => 2,
        // 'slug' => 'judul-empat',
        // 'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium soluta voluptate modi, error a iusto?',
        // 'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia harum cumque et commodi tempora voluptatem aperiam eos aut ratione fugit officiis placeat quos est doloremque eum quis a ut velit, suscipit dolore perferendis quidem consectetur dolorum? Sunt, ducimus praesentium explicabo error, optio deserunt quisquam non unde recusandae repellendus veniam tempore?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam alias esse temporibus deleniti sit, cupiditate molestias, hic totam exercitationem beatae veritatis expedita atque ipsum quos neque fugit sed, ut error reiciendis. Maxime impedit consectetur et voluptate ullam unde voluptatibus ea fuga, sit quae eligendi sint iusto facere, accusamus voluptas repellendus.</p>'
        // ]);

    }
}

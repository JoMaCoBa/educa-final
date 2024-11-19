<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        //  \App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);

         \App\Models\Category::factory()->create([
             'name' => 'Español',
         ]);

         \App\Models\Category::factory()->create([
             'name' => 'Inglés',
         ]);

         \App\Models\Category::factory()->create([
             'name' => 'Arte',
         ]);

         \App\Models\Category::factory()->create([
             'name' => 'Tecnología',
         ]);

         \App\Models\Category::factory()->create([
             'name' => 'Matemáticas',
         ]);

         \App\Models\Category::factory()->create([
             'name' => 'Ciencias',
         ]);

         \App\Models\Category::factory()->create([
             'name' => 'Emprendimiento',
         ]);


        //  \App\Models\Course::factory()->create([
        //     'name' => 'Español 1',
        //     'description' => 'jdhjdjsjs',
        //     'image_url' => '/',
        //     'category_id' => 1,
        //     'slug' => 'espanol-1',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Español 2',
        //     'description' => 'dhdhdhdh',
        //     'image_url' => '/',
        //     'category_id' => 1,
        //     'slug' => 'espanol-2',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Inglés 1',
        //     'description' => 'hjdhdhdhd',
        //     'image_url' => '/',
        //     'category_id' => 2,
        //     'slug' => 'ingles-1',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Inglés 2',
        //     'description' => 'hdhdhdhd',
        //     'image_url' => '/',
        //     'category_id' => 2,
        //     'slug' => 'ingles-2',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Arte 1',
        //     'description' => 'hdhdhd',
        //     'image_url' => '/',
        //     'category_id' => 3,
        //     'slug' => 'arte-1',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Arte 2',
        //     'description' => 'jdjdjdjd',
        //     'image_url' => '/',
        //     'category_id' => 3,
        //     'slug' => 'arte-2',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Tecnología 1',
        //     'description' => 'hjhjhjjh',
        //     'image_url' => '/',
        //     'category_id' => 4,
        //     'slug' => 'tecnologia-1',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Tecnología 2',
        //     'description' => 'hjkhjhjhjh',
        //     'image_url' => '/',
        //     'category_id' => 4,
        //     'slug' => 'tecnologia-2',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Matemáticas 1',
        //     'description' => 'hjhjhjhjhj',
        //     'image_url' => '/',
        //     'category_id' => 5,
        //     'slug' => 'matematicas-1',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Matemáticas 2',
        //     'description' => 'bjjhjhjhjh',
        //     'image_url' => '/',
        //     'category_id' => 5,
        //     'slug' => 'mateticas-2',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Ciencias 1',
        //     'description' => 'hjhjhjhj',
        //     'image_url' => '/',
        //     'category_id' => 6,
        //     'slug' => 'ciencias-1',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Ciencias 2',
        //     'description' => 'jhjhjhjhjhjh',
        //     'image_url' => '/',
        //     'category_id' => 6,
        //     'slug' => 'ciencias-2',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Emprendimiento 1',
        //     'description' => 'hhjhjhjhjhjh',
        //     'image_url' => '/',
        //     'category_id' => 7,
        //     'slug' => 'emprendimiento-1',
        //     'likes' => 0,
        // ]);

        // \App\Models\Course::factory()->create([
        //     'name' => 'Emprendimiento 2',
        //     'description' => 'hjhjhjhjhj',
        //     'image_url' => '/',
        //     'category_id' => 7,
        //     'slug' => 'emprendimiento-2',
        //     'likes' => 0,
        // ]);



        // \App\Models\Course::factory(20)->create();

        // \App\Models\lesson::factory(6)->create();


    }
}

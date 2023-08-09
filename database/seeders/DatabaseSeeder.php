<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create()->each(function ($user) {
            Profile::factory(1)->create([
                'user_id' => $user->id
            ])->each(function ($profile) {
                Address::factory(1)->create([
                    'profile_id' => $profile->id
                ]);
            });
        });

        \App\Models\Category::factory(10)->create();
        
        \App\Models\Post::factory(20)->create()->each(function($post){
            $post->image()->create([
                'url' => fake()->imageUrl()
            ]);
        });

        Tag::factory(8)->create()->each(function ($tag){
            $tag->posts()->sync(
                [1  => ['data' => 'primero'],2 => ['data' => 'segundo'],3 => ['data' => 'trecero']]
            );
        });




        Course::factory(10)->create()->each(function ($course) {
            Section::factory(4)->create([
                'course_id' => $course->id
            ])->each(function ($section) {
                Lesson::factory(5)->create([
                    'section_id' => $section->id
                ]);
            });
        });

        //  \App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);


    }
}

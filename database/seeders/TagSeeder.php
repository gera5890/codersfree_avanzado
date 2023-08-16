<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tag::factory(8)->create()->each(function ($tag){
            $tag->posts()->sync(
                [1 ,2 ,3 ]
            );
            $tag->courses()->sync([
                1,2,3
            ]);
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $posts = Post::all();

        $tags = Tag::factory(20)->create();

        foreach($posts as $post) {
            $randTags = $tags->random(rand(0, $tags->count()));
            foreach($randTags as $tag) {
                $tag->posts()->attach($post);
            }
        }
    }
}

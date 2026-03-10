<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $comedy = Category::where('name', 'Comedy')->first();
        $adventure = Category::where('name', 'Adventure')->first();
        $action = Category::where('name', 'Action')->first();
        $classic = Category::where('name', 'Classic')->first();

        Post::create([
            'title' => 'SpongeBob',
            'subtitle' => 'No more Patrick',
            'text' => 'SpongeBob lives in Bikini Bottom and goes on many funny adventures.',
            'category_id' => $classic?->id,
        ]);

        Post::create([
            'title' => 'Pink Panther',
            'subtitle' => 'His Pink House',
            'text' => 'Pink Panther is known for his calm style and iconic adventures.',
            'category_id' => $action?->id,
        ]);

        Post::create([
            'title' => 'Barbie',
            'subtitle' => 'Dream house adventures',
            'text' => 'Barbie explores fashion, friendship, and exciting new experiences.',
            'category_id' => $adventure?->id,
        ]);

        Post::create([
            'title' => 'Powerpuff Girls',
            'subtitle' => 'Saving Townsville',
            'text' => 'Blossom, Bubbles, and Buttercup protect Townsville from danger.',
            'category_id' => $comedy?->id,
        ]);
    }
}
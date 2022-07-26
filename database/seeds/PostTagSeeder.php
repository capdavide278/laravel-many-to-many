<?php

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();
        $tags = Tag::all()->pluck('id');
        $ntags = count($tags);

        foreach($posts as $post){
            $postTags = $faker->randomElements($tags, rand(0,$ntags));
            foreach($postTags as $tagId){
                $post->tags()->attach($tagId);
            }
        }
    }
}

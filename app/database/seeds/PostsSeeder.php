<?php

use Faker\Factory as Faker;

class PostsSeeder extends Seeder{

    public function run(){
        $faker = Faker::create();
        //remove current contents of table
        Post::truncate();        
        //add these posts
        for($i=0; $i<30; $i++){
            $post1 = new Post();
            $post1->title = strtoupper($faker->catchPhrase);
            $post1->body  = $faker->text($maxNbChars = 2000);
            $post1->img_url = $faker->imageUrl($width=900, $height=300, 'animals', true, 'Faker');
            $post1->save();
        }
    }
}

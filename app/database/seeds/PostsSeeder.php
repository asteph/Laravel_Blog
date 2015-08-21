<?php

class PostsSeeder extends Seeder{

    public function run(){
        //remove current contents of table
        Post::truncate();        
        //add these posts
    	$i = mt_rand(1, 9);
        $post1 = new Post();
        $post1->title = strtoupper('Eloquent is awesome!');
        $post1->body  = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus doloribus, culpa labore necessitatibus veniam quas eos vero asperiores eligendi facere minima commodi, magni dolorem, illo, odio soluta quod natus distinctio placeat. Non quod praesentium in ducimus temporibus, qui dolore, incidunt aspernatur nesciunt necessitatibus harum quibusdam provident accusantium modi facere maxime deleniti eaque iusto aliquam cum consectetur eligendi. Cum repellat, quibusdam saepe, dolor earum consectetur atque deserunt dolore officiis eius illo. A, molestiae, id. Molestias incidunt doloremque impedit eaque nulla voluptas.';
        $post1->img_url = "http://lorempixel.com/900/300/animals/$i";
        $post1->save();

        $i++;
        $post2 = new Post();
        $post2->title = strtoupper('Post number two');
        $post2->body  = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero quis iusto porro deleniti earum suscipit, eius vel alias minima a numquam cumque doloribus. Beatae quod laborum ullam illo, qui nisi reprehenderit expedita! Incidunt accusantium magnam voluptate esse quo vel numquam nesciunt consequatur nisi, error quas praesentium ipsam, fugit nemo exercitationem.';
        $post2->img_url = "http://lorempixel.com/900/300/animals/$i";
        $post2->save();

        $i++;
        $post3 = new Post();
        $post3->title = strtoupper('Post number three');
        $post3->body  = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero quis iusto porro deleniti earum suscipit, eius vel alias minima a numquam cumque doloribus. Beatae quod laborum ullam illo, qui nisi reprehenderit expedita! Incidunt accusantium magnam voluptate esse quo vel numquam nesciunt consequatur nisi, error quas praesentium ipsam, fugit nemo exercitationem.';
        $post3->img_url = "http://lorempixel.com/900/300/animals/$i";
        $post3->save();

        $i++;
        $post4 = new Post();
        $post4->title = strtoupper('Post number four');
        $post4->body  = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero quis iusto porro deleniti earum suscipit, eius vel alias minima a numquam cumque doloribus. Beatae quod laborum ullam illo, qui nisi reprehenderit expedita! Incidunt accusantium magnam voluptate esse quo vel numquam nesciunt consequatur nisi, error quas praesentium ipsam, fugit nemo exercitationem.';
        $post4->img_url = "http://lorempixel.com/900/300/animals/$i";
        $post4->save();
    }
}

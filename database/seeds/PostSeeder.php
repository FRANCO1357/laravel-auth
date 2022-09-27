<?php

use App\Models\Post;

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_post = new Post();

            $new_post->title = $faker->text(50);
            $new_post->slug = Str::slug($new_post->title, '-'); 
            $new_post->content = $faker->paragraphs(2, true);
            $new_post->image = $faker->imageUrl(300, 300); 

            $new_post->save();
        };
    }
}

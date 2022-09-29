<?php

use App\Models\Post;
use App\User;
use App\Models\Category;

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck('id')->toArray();
        $user_ids = User::pluck('id')->toArray();

        for($i = 0; $i < 20; $i++){
            $new_post = new Post();

            $new_post->title = $faker->text(50);
            $new_post->user_id = Arr::random($user_ids);
            $new_post->category_id = Arr::random($category_ids);
            $new_post->slug = Str::slug($new_post->title, '-'); 
            $new_post->content = $faker->paragraphs(2, true);
            $new_post->image = $faker->imageUrl(300, 300); 

            $new_post->save();
        };
    }
}

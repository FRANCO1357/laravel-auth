<?php

use App\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('categories');

        foreach($categories as $category){
            $new_catergory = new Category();
            $new_catergory->label = $category['label'];
            $new_catergory->color = $category['color'];
            $new_catergory->save();
        }
    }
}

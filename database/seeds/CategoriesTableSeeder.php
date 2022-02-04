<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'Javascript', 'PHP'];
        
        foreach ($data as $category) {
            
            $new_cat = new Category();

            $new_cat->name = $category;
            $new_cat->slug = Str::slug( $new_cat->name, '-');

            $new_cat->save();

        }
    }
}

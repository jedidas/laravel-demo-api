<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 7)->create();
        factory(App\Models\Category::class, 7)->create();
        factory(App\Models\Brand::class, 7)->create();
        factory(App\Models\Product::class, 7)->create();
        factory(App\Models\ProductVote::class, 30)->create();
        factory(App\Models\Favorite::class, 0)->create();
        factory(App\Models\Tag::class, 5)->create();
//        factory(App\Models\ProductTag::class, 40)->create();
//        factory(App\Models\ProductOption::class, 8)->create();
//        factory(App\Models\ProductOptionItem::class, 20)->create();
        factory(App\Models\Comment::class, 20)->create();
    }
}

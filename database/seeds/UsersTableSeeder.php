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
        factory(App\User::class, 120)->create();
        factory(App\Models\Category::class, 20)->create();
        factory(App\Models\Brand::class, 50)->create();
        factory(App\Models\Product::class, 900)->create();
        factory(App\Models\ProductVote::class, 400)->create();
        factory(App\Models\Favorite::class, 300)->create();
        factory(App\Models\Tag::class, 60)->create();
        factory(App\Models\ProductTag::class, 450)->create();
        factory(App\Models\ProductOption::class, 1200)->create();
        factory(App\Models\ProductOptionItem::class, 3600)->create();
        factory(App\Models\Comment::class, 900)->create();
    }
}

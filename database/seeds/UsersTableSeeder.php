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
        factory(App\Models\ProductVote::class, 2000)->create();
        factory(App\Models\Favorite::class, 300)->create();
        factory(App\Models\Tag::class, 120)->create();
        factory(App\Models\ProductTag::class, 60)->create();
        factory(App\Models\ProductOption::class, 500)->create();
        factory(App\Models\ProductOptionItem::class, 4000)->create();
        factory(App\Models\Comment::class, 5000)->create();
    }
}

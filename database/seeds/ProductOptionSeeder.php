<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 8; $i++) {
            DB::table('product_options')->insert(
                [
                    [
                        'product_id' => $i,
                        'name' => 'rims',
                        'required' => true,
                        'multiple' => false,
                        'max_count' => 1,
                        'active' => true
                    ],
                    [
                        'product_id' => $i,
                        'name' => 'doors',
                        'required' => true,
                        'multiple' => false,
                        'max_count' => 1,
                        'active' => true
                    ],
                    [
                        'product_id' => $i,
                        'name' => 'interior',
                        'required' => true,
                        'multiple' => false,
                        'max_count' => 1,
                        'active' => true
                    ],
                    [
                        'product_id' => $i,
                        'name' => 'transmission',
                        'required' => true,
                        'multiple' => false,
                        'max_count' => 1,
                        'active' => true
                    ],
                ]
            );
        }
    }
}

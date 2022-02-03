<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//
use Faker\Generator;
use Illuminate\Container\Container;

class ProductOptionItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         $table->string('name', 255);
            $table->double('price', 16, 2)->default(0.0);
            $table->string('image', 255)->nullable();
            $table->boolean('active')->default(true);
            $table->bigInteger('product_option_id')->unsigned();
         * */
        $price = [0, 650, 2467, 3800, 1980, 4500];
        $counter = 1;
        for ($i = 1; $i < 8; $i++) {
            for ($j = 1; $j < 5; $j++) {
                DB::table('product_option_items')->insert(
                    $this->getRandomItems($counter, $i, $j)
                );
                $counter++;
            }
        }
    }

    private function getRandomItems($counter, $i, $j)
    {
        $items = [
            [
                'name' => 'normal',
                'price' => 650,
                'image' => '/uploads/options/option-' . $j . '-1.png',
                'active' => true,
                'product_option_id' => $counter
            ],
            [
                'name' => 'medium',
                'price' => 2467,
                'image' => '/uploads/options/option-' . $j . '-2.png',
                'active' => true,
                'product_option_id' => $counter
            ],
            [
                'name' => 'pro',
                'price' => 3800,
                'image' => '/uploads/options/option-' . $j . '-3.png',
                'active' => true,
                'product_option_id' => $counter
            ],
            [
                'name' => 'premium',
                'price' => 4500,
                'image' => '/uploads/options/option-' . $j . '-4.png',
                'active' => true,
                'product_option_id' => $counter
            ],
            [
                'name' => 'platinum',
                'price' => 6500,
                'image' => '/uploads/options/option-' . $j . '-5.png',
                'active' => true,
                'product_option_id' => $counter
            ]
        ];
        $faker = Container::getInstance()->make(Generator::class);

        //Doors
        if($j == 2) {

            $items = [
                [
                    'name' => '2 doors',
                    'price' => 650,
                    'image' => '/uploads/options/option-door-1.png',
                    'active' => true,
                    'product_option_id' => $counter
                ],
                [
                    'name' => '4 doors',
                    'price' => 2467,
                    'image' => '/uploads/options/option-door-2.png',
                    'active' => true,
                    'product_option_id' => $counter
                ],
                [
                    'name' => '5 doors',
                    'price' => 3800,
                    'image' => '/uploads/options/option-door-3.png',
                    'active' => true,
                    'product_option_id' => $counter
                ],
            ];

            return $items;
        }

        //transmission
        if($j == 4) {

            $items = [
                [
                    'name' => 'manual',
                    'price' => 650,
                    'image' => '/uploads/options/option-transmission-1.png',
                    'active' => true,
                    'product_option_id' => $counter
                ],
                [
                    'name' => 'automatic',
                    'price' => 2467,
                    'image' => '/uploads/options/option-transmission-2.png',
                    'active' => true,
                    'product_option_id' => $counter
                ],
                [
                    'name' => 'CVT',
                    'price' => 3800,
                    'image' => '/uploads/options/option-transmission-3.png',
                    'active' => true,
                    'product_option_id' => $counter
                ],
                [
                    'name' => 'Semi-automatic',
                    'price' => 4270,
                    'image' => '/uploads/options/option-transmission-4.png',
                    'active' => true,
                    'product_option_id' => $counter
                ],
            ];

            return $items;
        }


        return $faker->randomElements($items, $faker->numberBetween(3, 5));
    }

}

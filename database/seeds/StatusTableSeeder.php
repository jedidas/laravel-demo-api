<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                "name" => "refunded"
            ],
            [
                "name" => "processing"
            ],
            [
                "name" => "pending payment"
            ],
            [
                "name" => "on hold"
            ],
            [
                "name" => "failed"
            ],
            [
                "name" => "completed"
            ],
            [
                "name" => "canceled"
            ],
        ]);
    }
}

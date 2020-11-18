<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Turn;
use Illuminate\Database\Seeder;

class TurnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Turn::factory(5)->create();
    }
}

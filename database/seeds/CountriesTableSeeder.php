<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 200;
        factory(Country::class, $count)->create();
    }
}

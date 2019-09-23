<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Timezone;

class TimezonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1000;
        factory(Timezone::class, $count)->create();
    }
}

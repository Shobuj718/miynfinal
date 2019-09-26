<?php

use Illuminate\Database\Seeder;
use App\Models\Master\BusinessWiseProfession;

class BusinessWiseProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(BusinessWiseProfession::class, $count)->create();
    }
}

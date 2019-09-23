<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100000;
        factory(Package::class, $count)->create();
    }
}

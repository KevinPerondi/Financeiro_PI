<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valores')->insertGetId(['valor'=>50]);
    }
}

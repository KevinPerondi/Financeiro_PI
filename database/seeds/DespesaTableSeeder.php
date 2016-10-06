<?php

use Illuminate\Database\Seeder;

class DespesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(\PI\Models\Despesa::class, 10)->create();
        //
    }
}

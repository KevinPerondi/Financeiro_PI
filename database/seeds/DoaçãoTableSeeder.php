<?php

use Illuminate\Database\Seeder;

class DoaçãoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(\PI\Models\Doação::class, 10)->create();
        //
    }
}

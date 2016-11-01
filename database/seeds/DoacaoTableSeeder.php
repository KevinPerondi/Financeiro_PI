<?php

use Illuminate\Database\Seeder;

class DoacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\PI\Models\Doacao::class, 10)->create();
    }
}

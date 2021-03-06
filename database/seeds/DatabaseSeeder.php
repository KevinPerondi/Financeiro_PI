<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(DespesaTableSeeder::class);
         $this->call(DoacaoTableSeeder::class);
         $this->call(ValorTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
    	factory(\PI\Models\User::class, 10)->create()->each(function ($c){
            for ($i = 0; $i<5; $i++){
                $c->mensalidades()->save(factory(\PI\Models\Mensalidade::class)->make());
            }

        });
        //
    }

}

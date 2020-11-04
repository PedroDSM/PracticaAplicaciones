<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class personas_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('personas')->insert([
                'comentario_id'=>$faker->numberBetween(2,10),
                'Nombre'=>$faker->firstName(),
                'Apellido_Paterno'=>$faker->lastname(),
                'Apellido_Materno'=>$faker->lastname()
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Modelos\Roles;

class roles_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Roles::class,2)->create();
    }
}

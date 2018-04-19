<?php

use Illuminate\Database\Seeder;

class TypeChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Painel\TypeChoice::class,50)->create();
    }
}

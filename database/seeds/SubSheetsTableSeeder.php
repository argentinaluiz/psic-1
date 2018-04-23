<?php

use Illuminate\Database\Seeder;

class SubSheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Painel\SubSheet::class,50)->create();
    }
}

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
        $listChoices = \App\Models\Painel\ListChoice::all();
        factory(\App\Models\Painel\TypeChoice::class,50)
            ->create()
            ->each(function (\App\Models\Painel\TypeChoice $model) use ($listChoices){
                /** @var Illuminate\Support\Collection $listChoicesCol */
                $listChoicesCol = $listChoices->random(10);
                $model->listChoices()->attach($listChoicesCol->pluck('id'));
            });
    }
}

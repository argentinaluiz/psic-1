<?php

namespace App\Providers;

use Code\Validator\Cnpj;
use Code\Validator\Cpf;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Illuminate\Support\ServiceProvider;
use App\Models\Painel\QuestionChoice;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        \Validator::extend('document_number', function($attribute,$value,$parameters,$validator){
           $documentValidator = $parameters[0] =='cpf' ? new Cpf(): new Cnpj();
           return $documentValidator->isValid($value);
        });
        \Validator::extend('choice_true', function ($attribute, $value, $parameters, $validator) {
            $items = collect($value)->filter(function ($item) {
                return isset($item['true']) && $item['true'] !== false;
            });
            return $items->count() === 1;
        });
        \Validator::extend('choice_from_question', function ($attribute, $value, $parameters, $validator) {
            //recebo: 'choices.7.question_choice_id'
            $data = $validator->getData();
            $questionIdAttr = str_replace('question_choice_id', 'question_id', $attribute);
            $questionId = array_get($data, $questionIdAttr);

            $choice = QuestionChoice
                ::where('question_id', $questionId)
                ->find($value);
            return $choice != null;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
       
        $this->app->singleton(\Faker\Generator::class, function(){
            return \Faker\Factory::create('pt_BR');
        });
       
    }
}

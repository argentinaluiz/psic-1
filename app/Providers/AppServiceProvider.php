<?php

namespace App\Providers;

use Code\Validator\Cnpj;
use Code\Validator\Cpf;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Illuminate\Support\ServiceProvider;

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

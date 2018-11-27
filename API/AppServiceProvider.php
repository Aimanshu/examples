<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema; //Import Schema    
    
    
class AppServiceProvider extends ServiceProvider
{
    
    protected $policies = [ 
        'App\Model' => 'App\Policies\ModelPolicy', 
    ];
    
    public function boot()
    {
        
           $this->registerPolicies();
           Passport::routes();
        
       Schema::defaultStringLength(191); //Solved by increasing StringLength
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    

}

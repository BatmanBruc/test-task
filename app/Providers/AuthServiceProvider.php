<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();
        Gate::define('create-request', function(){
            $user_data_request = Auth::user()->request;
            if(!$user_data_request){
                return true;
            }
            $user_data_request = Carbon::parse($user_data_request);
            $days = Carbon::now()->diff( $user_data_request )->days; 
            if($days > 0){
                return true;
            }else{
                return false;
            }
        });
        //
    }
}

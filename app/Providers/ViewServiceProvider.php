<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Make settings available to the view.
     *
     * @return void
     */
    public function boot()
    {
        //get settings
        $settings = Setting::all();
        $viewSettings = [];
        
        //format the settings so that a blade template can easily refer to them
        //by name rather than id.
        foreach($settings as $setting){
            $viewSettings[$setting->setting] = $setting->value;
        }
        
        
        view()->share('settings', $viewSettings);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

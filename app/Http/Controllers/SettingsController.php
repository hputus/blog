<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Setting;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function showSettings(){
        $settings = Setting::all();
        
        return view('settings',[
            'settings' => $settings
        ]);
    }
    
    public function update(Request $request){
        $settings = Setting::all();
        foreach($settings as $setting){
            $id = $setting->id;
            if(isset($request->{$id})){
                $setting->value = $request->{$id};
                $setting->save();
            }
        }
        return redirect('/admin/settings/');
    }
}

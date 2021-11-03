<?php

namespace App\Http\Controllers;

use Validator;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    public function edit(Setting $setting, $id = 1)
    {   
        if (Auth::check() ) {
            if (View::exists('settings.edit')) {
                $setting = Setting::findOrFail($id);
                return view('settings.edit',['setting' => $setting]);
            }
        }
        return view('auth.login');    
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        if (Auth::check() ) {

            $settingsUpdate = Setting::where('id', $setting->id)
                ->update([
                    'email' => $request->input('email'),
                    'spainInsurance' => $request->input('spainInsurance'),
                    'gps' => $request->input('gps'),
                    'extraDriver' => $request->input('extraDriver'),
                    'todlerSeat' => $request->input('todlerSeat'),
                    'infantSeat' => $request->input('infantSeat'),
                    'boosterSeat' => $request->input('boosterSeat'),
                        ]);
            if ($settingsUpdate) {
                if (View::exists('settings.show')) {
                    return redirect()->route('settings.show',['setting' => $settingsUpdate])
                                ->with('success', 'Settings Saved successfully');
                }
            }
        }
        return view('auth.login');    
    }

    public function show(Setting $setting)
    {
        if (Auth::check() ) {  
            $settings = Setting::findOrFail($setting);
            return view('settings.show',['settings' => $setting]);
        }
    }
}

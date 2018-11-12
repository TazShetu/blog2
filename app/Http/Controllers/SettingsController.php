<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $settings = Setting::first();
        return view('admin.settings.settings', compact('settings'));
    }


    // here no Request inside update(Request $request) like that
    // we use request() inside just for practise
    public function update()
    {
        //dd(request()->all());
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required'
        ]);

        $setting = Setting::first();
        $setting->site_name = request()->site_name;
        $setting->contact_number = request()->contact_number;
        $setting->contact_email = request()->contact_email;
        $setting->address = request()->address;

        $setting->save();
        Session::flash('success', 'Settings Updated');
        return redirect()->back();
    }
}



















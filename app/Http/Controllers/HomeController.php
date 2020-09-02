<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\update;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update(Request $request)
    {
        $request->validate([
            'app' => 'required|mimes:apk'
        ]);

        $new_app = New update();
        // generate random code to store name
        for( $Id= mt_rand(1,9), $increment = 1; $increment < 8; $increment++){
            $Id .= mt_rand(0,9);
        }

        // $extension = $request->app->;
        $extension = $request->app->extension();
        $app_name = "beta-9ja".$Id.".".$extension;
        // $app_name = "beta-9ja".$Id.".".getClientOriginalName();

        $new_app->app = 'app/'.$app_name;
        $new_app->save();

        $request->file('app')->storeAs('public/app', $app_name);

        return redirect()->back()->with('success', 'Your app upload was successfull');
    }
}

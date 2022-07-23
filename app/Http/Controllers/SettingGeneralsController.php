<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingGenerals;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Carbon\Carbon;

class SettingGeneralsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:general-list|general-create|general-edit|general-delete', ['only' => ['index','store']]);
         $this->middleware('permission:general-create', ['only' => ['create','store']]);
         $this->middleware('permission:general-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:general-delete', ['only' => ['destroy']]);
         $this->middleware('auth');
    }

    public function index()
    {
        $settinggeneral = SettingGenerals::findOrFail(1);
        return view('settings.dashboard-general', compact('settinggeneral'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
       $this->validate($request, [
            'title' => 'required|string|max:155',
        ]);

        $settinggeneral = SettingGenerals::findOrFail($id);

        if($request->file('logo')){
            $logofile= $request->file('logo');
            $logofilename= date('YmdHi').'-'.$logofile->getClientOriginalName();
            $logofile-> move(base_path('assets/images'), $logofilename);
        }
        else{
            $logofilename=$request->oldlogo;
        }

        if($request->file('favicon')){
            $faviconfile= $request->file('favicon');
            $faviconfilename= date('YmdHi').'-'.$faviconfile->getClientOriginalName();
            $faviconfile-> move(base_path('assets/images'), $faviconfilename);
        }
        else{
            $faviconfilename = $request->oldfavicon;
        }

        $settinggeneral->update([
            'title' => $request->title, 
            'tagline' => $request->tagline,
            'description' => $request->description,
            'email' => $request->email,
            'phone' => $request->phone,
            'theme' => $request->theme,
            'logo' => $logofilename,
            'favicon' => $faviconfilename,
            'language' => $request->language,
            'updated_at' => Carbon::now(),
        ]);
        

        if ($settinggeneral) {
            return redirect()
                ->route('settings.dashboard-general')
                ->with([
                    'success' => 'General Setting has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        
    }
}

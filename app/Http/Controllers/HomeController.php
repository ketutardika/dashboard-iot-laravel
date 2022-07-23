<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\FarmOrganization;
use App\Models\Projects;
use App\Models\ProjectsSections;
use App\Models\Sensors;
use App\Models\SensorsConfig;
use App\Models\SensorsType;
use App\Models\ExControl;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
        $user_id = Auth::user()->id;
        $datas = DB::table('users')->where('id',$user_id)->get();
        $controllings = ExControl::get();
        $ProjectsSections = ProjectsSections::where('user_id', $user_id)->with(['sectionssensor'])->get();
        $farms = FarmOrganization::where('user_id',$user_id)->get();
        $typesensors = SensorsType::oldest()->get();
        foreach ($datas as $data) {
            $hasfarm = $data->hasfarm;
            if ($hasfarm == 0) {
                return view('hello');
            }
            else{
                return view('dashboard', compact('ProjectsSections','typesensors','farms','controllings'));
            }
        }
        
    }

    public function hello()
    {
        return view('hello');
    }

    public function homeDashboard()
    {
        $user_id = Auth::user()->id;
        $datas = DB::table('projects')->where('user_id',$user_id)->where('isactive','1')->get();
        foreach ($datas as $data) {
            $hasproject = $data->unique_id;
        }
        return redirect('/'.$hasproject); 
    }
}

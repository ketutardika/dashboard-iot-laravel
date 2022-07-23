<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sensors;
use App\Models\SensorsConfig;
use App\Models\SensorsType;
use App\Models\SensorsDataLog;
use App\Models\ProjectsSections;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class SensorsDeviceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sensors-list|sensors-create|sensors-edit|sensors-api|sensors-config|sensors-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sensors-create', ['only' => ['create','store','createSensor']]);
         $this->middleware('permission:sensors-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sensors-delete', ['only' => ['destroy']]);

         $this->middleware('permission:sensors-api', ['only' => ['apiShow']]);

         $this->middleware('permission:sensors-config', ['only' => ['configShow']]);

         $this->middleware('auth');
    }
    
    public function index()
    {
        $sensors = Sensors::oldest()->get();
        return view('sensors.dashboard-sensor', compact('sensors'));
    }

    public function dashboardShow($unique_id)
    {
        $sections = ProjectsSections::where('unique_id',$unique_id)->latest()->get();
        $sensors = Sensors::where('unique_id_section',$unique_id)->oldest()->get();
        return view('sensors.dashboard-sensor-device', compact('sections','sensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typesensors = SensorsType::oldest()->get();
        return view('sensors.create-sensor', compact('typesensors'));
    }

    public function createSensor($unique_id)
    {
        $typesensors = SensorsType::oldest()->get();
        $sections = ProjectsSections::where('unique_id',$unique_id)->get();
        return view('sensors.create-sensor', compact('typesensors','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'name_sensor' => 'required|string|max:155',
        ]);

        $unique_id=null;
        if($request->unique_id=="")
        {
            $unique_id = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10));
        }
        else
        {
            $unique_id =  $request->unique_id;
        }

        $apikey = md5(microtime().rand());

        $sensor = Sensors::create([
            'unique_id' => $unique_id,
            'id_sensor_type' => $request->sensor_type_id,
            'name_sensor' => $request->name_sensor,
            'api_key' => $apikey,
            'id_user' => Auth::user()->id,
            'unique_id_section' => $request->unique_id_section,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if($sensor->save()) {
            $sensorconfig = SensorsConfig::create([
            'sensor_unique_id' => $unique_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        }

        if ($sensor) {
            return redirect()
                ->route('dashboard')
                ->with([
                    'success' => 'New Sensor has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unique_id)
    {
        $this->validate($request, [
            'name_sensor' => 'required|string|max:155',
            'notes' => 'required',
            'pin' => 'required|numeric',
            'deepsleep_time' => 'required|numeric',
            'min_temp' => 'required|numeric',
            'max_temp' => 'required|numeric',
        ]);

        $unique_id =  $request->unique_id;

        $sensor = Sensors::where('unique_id', '=', $unique_id);

        $sensor->update([
            'id_sensor_type' => $request->sensor_type_id,
            'name_sensor' => $request->name_sensor,
            'notes' => $request->notes,
            'pin' => $request->pin,
            'updated_at' => Carbon::now(),
        ]);

        if($sensor) {
            $sensorconfig = SensorsConfig::where('sensor_unique_id', '=', $unique_id);
            $sensorconfig->update([
            'deepsleep_time' => $request->deepsleep_time,
            'min_temp' => $request->min_temp,
            'max_temp' => $request->max_temp,
            'updated_at' => Carbon::now(),
        ]);
        }

        if ($sensor) {
            return redirect()
                ->route('sensors.index')
                ->with([
                    'success' => 'Sensor Device has been updated successfully'
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $data =DB::table('sensors_config')->leftJoin('sensors_device','sensors_config.sensor_unique_id', '=','sensors_device.unique_id')->where('sensors_device.id', $id);                           
        $data->delete();

        $sensors = Sensors::findOrFail($id);
        $sensors->delete();
       

        if ($sensors) {
            return redirect()
                ->route('sensors.index')
                ->with([
                    'success' => 'Sensor Device has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('sensors.index')
                ->with([
                    'error' => 'Sensor Device problem has occurred, please try again'
                ]);
        }
    }

    public function deleted(Request $request, $id)
    {   
        $data =DB::table('sensors_config')->leftJoin('sensors_device','sensors_config.sensor_unique_id', '=','sensors_device.unique_id')->where('sensors_device.id', $id);                           
        $data->delete();

        $sensors = Sensors::findOrFail($id);
        $sensors->delete();
       

        if ($sensors) {
            return redirect()
                ->back()
                ->with([
                	'success' => 'Sensor Device has been deleted successfully'
               	]);
        } else {
            return redirect()
                ->back()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function apiShow($unique_id)
    {
        $sensor = Sensors::where('unique_id', '=', $unique_id)->with('sensorconfig')->firstOrFail();

        // if($sensor->id_user != Auth::user()->id) {
        //     return redirect('sensors');
        // }

        $typesensors = SensorsType::oldest()->get();
        return view('sensors.api-sensor', compact('typesensors'))->with(array('sensor' => $sensor));
    }

    public function configShow($unique_id)
    {
        $sensor = Sensors::where('unique_id', '=', $unique_id)->with('sensorconfig')->firstOrFail();

        // if($sensor->id_user != Auth::user()->id) {
        //     return redirect('sensors');
        // }

        $typesensors = SensorsType::oldest()->get();
        return view('sensors.config', compact('typesensors'))->with(array('sensor' => $sensor));
    }

    public function datalogShow($unique_id)
    {
        $sensordatalogs = SensorsDataLog::leftJoin('sensors_device','sensors_datalog.unique_id', '=','sensors_device.unique_id')->where('sensors_datalog.unique_id', '=', $unique_id)->orderBy('sensors_datalog.updated_at', 'desc')->paginate(5);
        $sensordataid = $unique_id;
        return view('sensors.datalog', compact('sensordatalogs'))->with('unique_id', $sensordataid);
    }

    public function typeSensor()
    {
        $typesensors = SensorsType::latest()->get();
        return view('sensors.type', compact('typesensors'));
    }
    public function data($unique_id, $type)
    {
            $sensor = Sensors::where('unique_id', '=', $unique_id)->firstOrFail();
            $temperature = round($sensor->last_temp, 2);
            $humidity = round($sensor ->last_hum, 2);

            $time = time() * 1000;

            return Response::json(array(array($time, $temperature), array($time, $humidity)));
    }

    public function monitor($unique_id) 
    {

    }    
}

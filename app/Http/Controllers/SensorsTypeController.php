<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sensors;
use App\Models\SensorsConfig;
use App\Models\SensorsType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SensorsTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $typesensors = SensorsType::latest()->get();
        return view('sensors.type', compact('typesensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensors.type-create');
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
            'sensor_type_name' => 'required|string|max:155',
            'sensor_type_code' => 'required',
        ]);

        $sensorstype = SensorsType::create([
            'sensor_type_name' => $request->sensor_type_name,
            'sensor_type_code' => $request->sensor_type_code,
            'sensor_type_measurement' => $request->sensor_type_measurement,
            'sensor_type_measurement_code' => $request->sensor_type_measurement_code,
            'sensor_type_description' => $request->sensor_type_description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);



        if ($sensorstype) {
            return redirect()
                ->route('sensors-type.index')
                ->with([
                    'success' => 'New Project has been created successfully'
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
        $sensorstype = SensorsType::findOrFail($id);
        return view('sensors.type-edit', compact('sensorstype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sensor_type_name' => 'required|string|max:155',
            'sensor_type_code' => 'required',
        ]);

        $sensorstype = SensorsType::findOrFail($id);

        $sensorstype->update([
            'sensor_type_name' => $request->sensor_type_name,
            'sensor_type_code' => $request->sensor_type_code,
            'sensor_type_measurement' => $request->sensor_type_measurement,
            'sensor_type_measurement_code' => $request->sensor_type_measurement_code,
            'sensor_type_description' => $request->sensor_type_description,
            'updated_at' => Carbon::now(),
        ]);

        if ($sensorstype) {
            return redirect()
                ->route('sensors-type.index')
                ->with([
                    'success' => 'Project has been updated successfully'
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
    public function destroy($id)
    {
        $typesensors = SensorsType::findOrFail($id);
        $typesensors->delete();

        if ($typesensors) {
            return redirect()
                ->route('sensors-type.index')
                ->with([
                    'success' => 'Project has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('sensors.type')
                ->with([
                    'error' => 'Project problem has occurred, please try again'
                ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sensors;
use App\Models\SensorsConfig;
use App\Models\SensorsDataLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;

class DataController extends Controller
{
    public function update(Request $request)
    {
       if($request->get('status') == 'success' )
       {
           

        if(!is_numeric($request->get('v')) )
        {
            if($request->get('response_type')=="basic")
            return response("error")->header('Content-Type', 'text/plain');
            return Response::json(["status"=>"error", "reason"=>"Invalid temperature or humidity readings. Must be numeric value."]);
        }

        $sensor = Sensors::where('unique_id', '=', $request->get('id'))->first();

        if(!$sensor)
        {
        	if(Input::get('response_type')=="basic")
                return response("error")->header('Content-Type', 'text/plain');
            return Response::json(["status"=>"error", "reason"=>"Invalid sensor unique ID."]);
        }

        if($sensor->api_key!=$request->get('api_key'))
        {
            if($request->get('response_type')=="basic")
                return response("error")->header('Content-Type', 'text/plain');
            return Response::json(["status"=>"error", "reason"=>"Invalid API key."]);
        }

        $sensor->last_temp = $request->get('v');
        $sensor->last_check = Carbon::now();
//        $sensor->mac_address= Input::get('m');
//        $sensor->version = Input::get('f');

        $sensor->save();

        $datalog = new SensorsDataLog();
        $datalog->unique_id = $request->get('id');
        $datalog->data_reading = $request->get('v');
        $datalog->data_measurement = $request->get('v');
        $datalog->created_at = Carbon::now();
        $datalog->updated_at = Carbon::now();
        $datalog->save();


        if($request->get('response_type')=="esp8266")
        {
            $r = "";
            $r.= "QS1=SUCCESSQE1\n";

            $sensorconfig = SensorsConfig::where('sensor_unique_id', '=', $request->get('id'))->firstOrFail();
            $r.="QS2=".$sensorconfig->deepsleep_time."QE2\n";
            $r.="QS3=".$_ENV['APP_URL']."QE3";
            return response($r)
                ->header('Content-Type', 'text/plain');
        }

        else{

        if($sensor->save()){
            $dbs="update db success";
        }

        if($datalog->save()){
            $dba="datalog success";
        }

        $sensorconfig = SensorsConfig::where('sensor_unique_id', '=', $request->get('id'))->firstOrFail();
        $status = "success";
        $response = [];

        $response["status"] = $status;
        $response["value"] = $datalog->data_reading;
        $response["last_check"] = $sensor->last_check;
        $response["update"] = $dbs;
        $response["datalog"] = $dba;
        $response["read_every"] = $sensorconfig->deepsleep_time;

        return Response::json($response);
    	}
    }
    else{
        $status = "error - sensor not connect";
        $response["status"] = $status;
        return Response::json($response);
    }
    }

     public function data($unique_id, $type)
    {
        if($type=="live")
        {
            $sensor = Sensors::where('unique_id', '=', $unique_id)->firstOrFail();
            $temperature = round($sensor->last_temp, 2);
            $humidity = round($sensor ->last_hum, 2);

            $time = time() * 1000;

            return Response::json(array(array($time, $temperature), array($time, $humidity)));
        }

    }
}

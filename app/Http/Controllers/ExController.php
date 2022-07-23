<?php

namespace App\Http\Controllers;

use App\Models\ExControl;
use Facade\FlareClient\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class ExController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controlling = ExControl::orderBy('id', 'ASC')->paginate(5);
        $response = [
            'message' => 'Controlling Device',
            'data' => $controlling,
        ];
        return response()->json($response, HttpFoundationResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $controlling = ExControl::where('id', $id)->firstOrFail();
        if (is_null($controlling)) {
            return $this->sendError('Device Not Found');
        }
        return response()->json([
            "success" => true,
            "message" => "Device Found.",
            "data" => $controlling,
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id,$status)
    {
        $controlling = ExControl::find($id);
        $controlling->value = $status;
        $controlling->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}

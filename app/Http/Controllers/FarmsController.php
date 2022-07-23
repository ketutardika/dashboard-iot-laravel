<?php

namespace App\Http\Controllers;
use App\Models\FarmOrganization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;

class FarmsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:farms-list|farms-create|farms-edit|farms-delete', ['only' => ['index','store']]);
         $this->middleware('permission:farms-create', ['only' => ['create','store']]);
         $this->middleware('permission:farms-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:farms-delete', ['only' => ['destroy']]);
         $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $farms = FarmOrganization::where('user_id',$user_id)->latest()->get();
        return view('farms.dashboard-farm', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farms = FarmOrganization::findOrFail($id);
        $farms->delete();

        if ($farms) {
            return redirect()
                ->route('farms.index')
                ->with([
                    'success' => 'Section has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('farms.index')
                ->with([
                    'error' => 'Section problem has occurred, please try again'
                ]);
        }
    }
}

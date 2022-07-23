<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectsSections;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

class SectionsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sections-list|sections-create|sections-edit|sections-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sections-create', ['only' => ['create','store']]);
         $this->middleware('permission:sections-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sections-delete', ['only' => ['destroy']]);
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
        $sections = ProjectsSections::where('user_id',$user_id)->latest()->get();
        return view('sections.dashboard-section', compact('sections'));
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
        $sections = ProjectsSections::findOrFail($id);
        $sections->delete();

        if ($sections) {
            return redirect()
                ->route('sections.index')
                ->with([
                    'success' => 'Section has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('sections.index')
                ->with([
                    'error' => 'Section problem has occurred, please try again'
                ]);
        }
    }
}

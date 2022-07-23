<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

class ProjectsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:projects-list|projects-create|projects-edit|projects-delete', ['only' => ['index','store']]);
         $this->middleware('permission:projects-create', ['only' => ['create','store']]);
         $this->middleware('permission:projects-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:projects-delete', ['only' => ['destroy']]);
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
        $projects = Projects::where('user_id',$user_id)->latest()->get();
        return view('projects.dashboard-project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create-project');
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
            'name_project' => 'required|string|max:155',
            'type_project' => 'required',
            'description_project' => 'required',
        ]);

        $project = Projects::create([
            'name_project' => $request->name_project,
            'type_project' => $request->type_project,
            'description_project' => $request->description_project,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($project) {
            return redirect()
                ->route('projects.index')
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
        $project = Projects::findOrFail($id);
        return view('projects.edit-project', compact('project'));
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
            'name_project' => 'required|string|max:155',
            'type_project' => 'required',
            'description_project' => 'required',
        ]);

        $project = Projects::findOrFail($id);

        $project->update([
            'name_project' => $request->name_project,
            'type_project' => $request->type_project,
            'description_project' => $request->description_project,
            'updated_at' => Carbon::now(),
        ]);

        if ($project) {
            return redirect()
                ->route('projects.index')
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
        $projects = Projects::findOrFail($id);
        $projects->delete();

        if ($projects) {
            return redirect()
                ->route('projects.index')
                ->with([
                    'success' => 'Project has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('projects.index')
                ->with([
                    'error' => 'Project problem has occurred, please try again'
                ]);
        }
    }

}

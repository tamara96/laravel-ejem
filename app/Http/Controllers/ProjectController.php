<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\SaveProjectRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Events\ProjectSaved;
use App\Models\Category;

class ProjectController extends Controller
{
    Public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        
    }
    public function index()
    {
        return view('projects.index', ['projects' => Project::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create', [
            'project' => new Project,
            'categories' =>Category::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        $project = new Project( $request->validated() );

        $project->image = $request->file('image')->store('images'); 

        $project->save();

        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'categories' =>Category::pluck('name', 'id')

        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
        if( $request->hasFile('image'))
        {
            Storage::delete($project->image);
            $project->fill( $request->validated() );
            $project->image = $request->file('image')->store('images'); 
            $project->save();

            ProjectSaved::dispatch($project);
        }else{
            $project->update( array_filter($request->validated()) );
        }
        

        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con exito.');
    }
  
}

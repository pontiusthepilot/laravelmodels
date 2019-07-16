<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

/*
Verb          Path                           Action    Route Name
GET           /projects                      index     projects.index
GET           /projects/create               create    projects.create
POST          /projects                      store     projects.store
GET           /projects/{user}               show      projects.show
GET           /projects/{user}/edit          edit      projects.edit
PUT|PATCH     /projects/{user}               update    projects.update
DELETE        /projects/{user}               destroy   projects.destroy
*/

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  // Put this here for now. In the long term move it to web.php
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', ['projects' => $projects]);
        // return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
        ]);

        $attributes['owner_id'] = auth()->id();

        Project::create($attributes);

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // $pr = Project::findOrFail($project);

        // return view('projects.show');

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}

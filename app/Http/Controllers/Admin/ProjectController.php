<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller


{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('updated_at')->orderByDesc('created_at')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {

        $request->validate([

            /*'title' => 'required|string|min:5|max:40|unique:projects',
            'content' => 'required|string',
            'image' => 'required|image'*/]);

        $data = $request->all();
        $newProject = new Project();
        if (Arr::exists($data, 'image')) {
            $img_url = Storage::putFile('project_images', $data['image']);
            $newProject->image = $img_url;
        }
        $newProject->fill($data);
        $newProject->save();
        return to_route('admin.projects.index', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        if (Arr::exists($data, 'image')) {
            if ($project->image) Storage::delete($project->image);
            $img_url = Storage::putFile('project_images', $data['image']);
            $project->image = $img_url;
        }
        $project->update($data);
        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)

    {
        if ($project->image) Storage::delete($project->image);
        $project->delete();
        return to_route('admin.projects.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $projects = Project::paginate(15);
        return view('projet.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate(request(), [
            'nom' => 'required',
            'code' => 'required',
        ]);

        $nom = request('nom');
        $code = request('code');

        Project::insert([
            ['nom_projet' => $nom, 'code_projet' => $code]
        ]);

        Session::flash('successpro','Projet bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');
        $projet = Project::find($id);

        if ($nom) {
            $projet->nom_projet = $nom;
        }
        if ($code) {
            $projet->code_projet = $code;
        }

        $projet->save();

        Session::flash('succuppro','Projet bien modifié');
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
        return redirect()->back()->with('deletepro', 'Project supprimé avec succès');
        //return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\SousAtelier;
use Illuminate\Http\Request;
use Session;

class SousAtelierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SousAtelier $sousatelier)
    {
        $sas = SousAtelier::paginate(15);
        return view('sous-atelier.index', compact('sas'));
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
        $this->validate(request(), [
            'nom' => 'required',
            'code' => 'required',
        ]);

        $nom = request('nom');
        $code = request('code');

        SousAtelier::insert([
            ['nom_sa' => $nom, 'code_sa' => $code]
        ]);

        Session::flash('addsa', 'Sous atelier bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SousAtelier  $sousAtelier
     * @return \Illuminate\Http\Response
     */
    public function show(SousAtelier $sousAtelier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SousAtelier  $sousAtelier
     * @return \Illuminate\Http\Response
     */
    public function edit(SousAtelier $sousAtelier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SousAtelier  $sousAtelier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');
        $sase = SousAtelier::find($id);
        
        if ($nom) {
            $sase->nom_sa = $nom;
        }
        if ($code) {
            $sase->code_sa = $code;
        }
        
        $sase->save();

        Session::flash('updatesa', 'Sous atelier bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SousAtelier  $sousAtelier
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousAtelier $sousAtelier)
    {
        $sousAtelier->delete();
        return redirect()->back()->with('deleteatelier', 'Sous atelier supprimé avec succès');
        //return back();
    }
}

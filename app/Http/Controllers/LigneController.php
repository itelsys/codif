<?php

namespace App\Http\Controllers;

use App\Ligne;
use Illuminate\Http\Request;
use Session;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ligne $ligne)
    {
        $lgs = Ligne::paginate(15);
        return view('ligne.index', compact('lgs')); 
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
    public function store(Request $request)
    {
        $this->validate(request(), [
            'nom' => 'required',
            'code' => 'required',
        ]);

        $nom = request('nom');
        $code = request('code');

        Ligne::insert([
            ['nom_ligne' => $nom, 'code_ligne' => $code]
        ]);

        Session::flash('addligne', 'Ligne bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function show(Ligne $ligne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function edit(Ligne $ligne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');

        $lge = ligne::find($id);  
        if ($nom) {
            $lge->nom_ligne = $nom;
        }
        if ($code) {
            $lge->code_ligne = $code;
        }

        $lge->save();

        Session::flash('updligne', 'Ligne bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ligne $ligne)
    {
        $ligne->delete();
        return redirect()->back()->with('deleteligne', 'Ligne supprimé avec succès');
        //return back();
    }
}

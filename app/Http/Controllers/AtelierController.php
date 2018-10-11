<?php

namespace App\Http\Controllers;

use App\Atelier;
use Illuminate\Http\Request;
use Session;

class AtelierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Atelier $atelier)
    {
        $ats = Atelier::paginate(15);
        return view('atelier.index', compact('ats'));
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
        Atelier::insert([
            ['nom_atelier' => $nom, 'code_atelier' => $code]
        ]);

        Session::flash('atelieradd', 'Atelier bien ajouté');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function show(Atelier $atelier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function edit(Atelier $atelier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');

        $ates = Atelier::find($id);  
        if ($nom) {
            $ates->nom_atelier = $nom;
        }
        if ($code) {
            $ates->code_atelier = $code;
        }

        $ates->save();
        Session::flash('ateliermod', 'Atelier bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atelier  $atelier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atelier $atelier)
    {
        $atelier->delete();
        return redirect()->back()->with('deleteatel', 'Atelier supprimé avec succès');
        //return back();
    }
}

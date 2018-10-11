<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Http\Request;
use Session;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Departement $departement)
    {
        $deps = Departement::paginate(15);
        return view('departement.index', compact('deps'));
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

        Departement::insert([
            ['nom_dep' => $nom, 'code_dep' => $code]
        ]);

        Session::flash('sucDep', 'Département bien ajouté');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');
        $dep = Departement::find($id);

        if ($nom) {
            $dep->nom_dep = $nom;
        }
        if ($code) {
            $dep->code_dep = $code;
        }

        $dep->save();

        Session::flash('sucupDep', 'Département bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->back()->with('deletedep', 'Département supprimé avec succès');
        //return back();
    }
}

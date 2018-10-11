<?php

namespace App\Http\Controllers;

use App\Equipement;
use Illuminate\Http\Request;
use Session;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Equipement $equipement)
    {
        $equips = Equipement::paginate(15);
        return view('equipement.index', compact('equips'));
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

        Equipement::insert([
            ['nom_equip' => $nom, 'code_equip' => $code]
        ]);

        Session::flash('addequip', 'Equipement bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function show(Equipement $equipement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipement $equipement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipement $equipement)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');

        $equ = Equipement::find($id);
        if ($nom) {
            $equ->nom_equip = $nom;
        }
        if ($code) {
            $equ->code_equip = $code;
        }
        
        $equ->save();

        Session::flash('updequip', 'Equipement bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipement $equipement)
    {
        $equipement->delete();
        return redirect()->back()->with('deletequip', 'Equipement supprimé avec succès');
        //return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;
use Session;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plan $plan)
    {
        $pls = Plan::paginate(15);
        return view('plan.index', compact('pls'));
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
        Plan::insert([
            ['nom_plan' => $nom, 'code_plan' => $code]
        ]);

        Session::flash('planadd', 'Plan bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');
        $pln = Plan::find($id);
        if ($nom) {
            $pln->nom_plan = $nom;
        }
        if ($code) {
            $pln->code_plan = $code;
        }
        
        $pln->save();

        Session::flash('planupd', 'Plan bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->back()->with('deleteplan', 'Plan supprimé avec succès');
        //return back();
    }
}

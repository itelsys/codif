<?php

namespace App\Http\Controllers;

use App\Codplan;
use Illuminate\Http\Request;
use App\codifPlan;
use App\Site;
use App\Project;
use App\Atelier;
use App\Ligne;
use App\SousAtelier;
use App\Equipement;
use App\Plan;
use App\Document;
use App\Actions;
use Session;
use Carbon\Carbon;

class CodplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sites = Site::all();
        $pros = Project::all();
        $ats = Atelier::all();
        //$ligns = Ligne::all();
        $sousa = SousAtelier::all();
        $equips = Equipement::all();
        //$plns = Plan::all();

        if ($request->has('form1')) {
            $this->validate(request(), [
                'site' => 'required',
                'projet' => 'required',
                'ate' => 'required',
                'sousate' => 'required',
                'equipe' => 'required',
                //'plan' => 'required',
            ]);

            $site = $request->input('site');
            $pro = $request->input('projet');
            $ate = $request->input('ate');
            //$ligne = $request->input('ligne');
            $soa = $request->input('sousate');
            $equipe = $request->input('equipe');
            //$plan = $request->input('plan');
            $yr = request('date');
            $year = substr($yr, -2);
            $val = codifPlan::where([
                ['code_site', $site],
                ['code_projet', $pro],
                ['code_atelier', $ate],
                ['code_sousa', $soa],
                ['code_equip', $equipe],
                //['code_plan', $plan]
            ])->max('num_plan');


            if ($val) {
                $i = $val + 1;
                $code = $site ."-". $pro ."-". $ate."-".$soa."-".$equipe."-".sprintf("%03d", $i)."/".$year;
            }else{
                $i = 1;
                $code = $site ."-". $pro ."-". $ate."-".$soa."-".$equipe."-".sprintf("%03d", $i)."/".$year;
            }

            return view('codifPlan.index', compact('sites','pros','ats','sousa','equips'))->with('code',$code);
        }else{
            return view('codifPlan.index', compact('sites','pros','ats','sousa','equips'))->with('code',null);
        }
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
            'link' => 'required'
        ]);
        $returned = $request->input('code');
        $link = $request->input('link');
        $ret = explode('-', $returned);
        
        $site = $ret[0];
        $projet = $ret[1];
        $ate = $ret[2];
        //$lg = $ret[3];
        $sate = $ret[3];
        $equi = $ret[4];
        $val = $ret[5];
        $val = explode("/", $val);
        $num = $val[0];
        $mytime = Carbon::now();
        $year = $mytime->year;
        codifPlan::insert([
            ['code_site' => $site, 'code_projet' => $projet, 'code_atelier' => $ate, 'code_sousa' => $sate, 'code_equip' => $equi, 'num_plan' => $num, 'lien' => $link, 'version' => 'v-1', 'annee' => $year]
        ]);

        Actions::insert([
            ['user_id' => Auth()->user()->id, 'user_name' => Auth()->user()->name, 'action' =>"Codification plan", "codech" => $returned, 'link' => $link]
        ]);

        Session::flash('successplan','Votre plan a été ajouté avec succès');
        return redirect('codifPlan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Codplan  $codplan
     * @return \Illuminate\Http\Response
     */
   public function show(codifPlan $codplan, Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Codplan  $codplan
     * @return \Illuminate\Http\Response
     */
    public function edit(Codplan $codplan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Codplan  $codplan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codplan $codplan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Codplan  $codplan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codplan $codplan)
    {
        //
    }
}

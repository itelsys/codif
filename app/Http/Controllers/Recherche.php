<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plan;
use App\codifPlan;
use App\Actions;
use Session;
use DB;
class Recherche extends Controller
{
    public function index()
    {
        return view('rechercheplan.index');
    }

    public function show(Request $request, codifPlan $codplan)
    {
        // $codech = request('site')."-".request('projet')."-".request('atelier')."-".request('satelier')."-".request('equipement')."-".sprintf("%03d", request('code'));
        
        // Actions::insert([
        //     ['user_id' => Auth()->user()->id, 'user_name' => Auth()->user()->name, 'action' =>"Chercher un plan", 'codech' => $codech]
        //     ]);
        $st = request('site');
        $pr = request('projet');
        $atel = request('atelier');
        $satel = request('satelier');
        $equip = request('equipement');
        $code = request('code');
        $ane = request('annee');

    	$condition = "";

        if($st)
        {
            $val_1 = '"'.$st.'"';
        }else{
            $val_1 = '""';
        }

        if ($pr) {
            $val_2 = '"'.$pr.'"';
        }else{
            $val_2 = '""';
        }

        if($atel){
            $val_3 = '"'.$atel.'"';
        }else{
            $val_3 = '""';
        }
        
        if ($satel) {
           $val_4 = '"'.$satel.'"';
        }else{
            $val_4 = '""';
        }
        if ($equip) {
            $val_5 = '"'.$equip.'"';
        }else{
            $val_5 = '""';
        }
        if($ane){
            $val_6 = '"'.$ane.'"';
        }else{
            $val_6 = '""';
        }
        if($code){
            $val_7 = '"'.$code.'"';
        }else{
            $val_7 = '""';
        }

        $codplan = DB::select('call recherche_plan('.$val_1.','.$val_2.','.$val_3.','.$val_4.','.$val_5.','.$val_7.','.$val_6.')');
        return view('rechercheplan.index', compact('codplan'));
    }

    public function update(Request $request)
    {
        $id = request('id');
        $lien = request('lien');
        $code = request('code');
        $code = '"'.$code.'"';
        $link = '"'.$lien.'"';

        $pl = codifPlan::find($id);
        $v = $pl->version;
        $v = explode('-', $v);
        $v = $v[1];
        $v = $v + 1;

        if ($lien) {
            $pl->lien = $lien;
            $pl->version = 'v-'.$v;      
        }

        DB::select('update actions set link= '.$link.' where codech = '.$code);

        $pl->save();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use App\Actions;
use Session;
use App\Site;
use DB;
use Carbon\Carbon;

class DocumentController extends Controller
{
    public function index()
    {
        $document = null;
        return view('recherche.index', compact('document'));
    }
    
    public function create(Request $request, Document $doc)
    {
        
    }
   
    public function store(Request $request, Document $doc)
    {
        $this->validate(request(), [
            'link' => 'required'
        ]);
        $returned = $request->input('code');
        $link = $request->input('link');
        $ret = explode('-', $returned);
        $site = $ret[0];
        $projet = $ret[1];
        $dep = $ret[2];
        $doc = $ret[3];
        $val = $ret[4];
        $val = explode("/", $val);
        $num = $val[0];
        //$time = $val[1];
        $mytime = Carbon::now();
        $year = $mytime->year;
        Document::insert([
            ['code_site' => $site, 'code_projet' => $projet, 'code_dep' => $dep, 'code_doc' => $doc, 'num_doc' => $num, 'lien' => $link, 'version' => 'v-1', 'annee' => $year ]
        ]);
        Actions::insert([
            ['user_id' => Auth()->user()->id, 'user_name' => Auth()->user()->name, 'action' =>"Codification document", "codech" => $returned, 'link' => $link]
        ]);
        Session::flash('successcod','Votre document a été ajouté avec succès');
        return redirect('codification')->withInput(['id' => $num]);
    }

    public function show(Document $document, Request $request)
    {
        // $codech = request('site')."-".request('projet')."-".request('dep')."-".request('typedoc')."-".sprintf("%03d", request('codedoc'));
        //$codech = request('site');
        // if ($request->has('cherchedocu')) {
        //     Actions::insert([
        //         ['user_id' => Auth()->user()->id, 'user_name' => Auth()->user()->name, 'action' =>"Chercher un lien document", 'codech' => $codech]
        //     ]);
        // }
        $st = request('site');
        $pr = request('projet');
        $dp = request('dep');
        $dt = request('doc');
        $nm = request('codedoc');
        $yr = request('year');
        if ($st) {
            $val_1 = '"'.$st.'"';
        }else{
            $val_1 = '""';
        }
        if ($pr) {
            $val_2 = '"'.$pr.'"';
        }else{
            $val_2 = '""';
        }
        if ($dp) {
            $val_3 = "'".$dp."'";
        }else{
            $val_3 = "''";
        }
        if ($dt) {
            $val_4 = "'".$dt."'";
        }else{
            $val_4 = "''";
        }
        if ($nm) {
            $val_5 = '"'.$nm.'"';
        }else{
            $val_5 = "''";
        }
        if($yr) {
            $val_6 = '"'.$yr.'"';
        }else{
            $val_6 = "''";
        }
        

        //dd('call table_recherche(?,?,?,?)',array("''","''","''","''"));
        //$document = DB::select('select * from recherche where'.$condition);
        //$document = DB::select('CALL table_recherche()');

        $document=DB::select('call recherche_doc('.$val_1.','.$val_2.','.$val_3.','.$val_4.','.$val_5.','.$val_6.')');
            
        return view('recherche.index', compact('document','act', 'msite'));      
        
    }

    public function update(Request $request)
    {

        $id = request('id');
        $lien = request('lien');
        $code = request('code');
        $code = '"'.$code.'"';
        $link = '"'.$lien.'"';
        $doc = Document::find($id);
       // $act = Actions::where('codech', $code)->get();
        $v = $doc->version;
        $v = explode('-', $v);
        $v = $v[1];
        $v = $v + 1;

        
        DB::select('update actions set link= '.$link.' where codech = '.$code);
        if ($lien) {
            $doc->lien = $lien;
            $doc->version = 'v-'.$v;      
        }
        $doc->save();

        return back();
    }
    
}

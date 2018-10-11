<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Site;
use Session;

class SiteController extends Controller
{
    public function index(Site $site)
    {
    	$sites = Site::paginate(15);
    	return view('site.index', compact('sites'));
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
            'nom' => 'required',
            'code' => 'required',
        ]);
        $nom = request('nom');
        $code = request('code');

        Site::insert([
        	['nom_site' => $nom, 'code_site' => $code]
        ]);

        Session::flash('successite','Site bien ajouté');
    }
    
    public function update(Request $request)
    {
    	$id = request('id');
    	$nom = request('nom');
    	$code = request('code');
    	$site = Site::find($id);
    	if ($nom) {
    		$site->nom_site = $nom;
    	}
    	if ($code) {
    		$site->code_site = $code;
    	}
    	$site->save();
        Session::flash('successitem','Site bien modifié');
    }
    public function destroy(Site $site)
    {
    	$site->delete();
        return redirect()->back()->with('deletesite', 'Site supprimé avec succès');
    	//return back();
    }
}

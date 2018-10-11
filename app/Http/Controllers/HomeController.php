<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Site;
use App\Project;
use App\Departement;
use App\Document_type;
use App\Document;
use App\Actions;
use Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Site $site, Project $pro, Departement $dep, Document_type $doc)
    {
        $sites = Site::all();
        $pros = Project::all();
        $deps = Departement::all();
        $docs = Document_type::all();

        if ($request->has('form1')) {
            $this->validate(request(), [
                'site' => 'required',
                'projet' => 'required',
                'dep' => 'required',
                'doc_type' => 'required',
            ]);

            $site = $request->input('site');
            $pro = $request->input('projet');
            $dep = $request->input('dep');
            $doc = $request->input('doc_type');
            $yr = request('date');
            $year = substr($yr, -2);
            $val = Document::where([
                ['code_site', $site],
                ['code_projet', $pro],
                ['code_dep', $dep],
                ['code_doc', $doc]
            ])->max('num_doc');
            
            if ($val) {
                $i = $val + 1;
                $code = $site ."-". $pro ."-". $dep."-".$doc."-".sprintf("%03d", $i)."/".$year;
            }else{
                $i = 1;
                $code = $site ."-". $pro ."-". $dep."-".$doc."-".sprintf("%03d", $i)."/".$year;
            }
            
            $data = ['code' => $code, 'document' => null];
            return view('codification.index', compact('sites','pros','deps','docs'))->with($data);

         }
        else{
            $data = ['code' => null, 'document' => null];
            return view('codification.index', compact('sites','pros','deps','docs'))->with($data);
        }
        
    }

    public function store(Request $request, Document $doc)
    {
        
    }

    public function showChangePasswordForm(){

        return view('auth.changepassword');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Votre mot de passe actuel ne correspond pas au mot de passe que vous avez fourni. Veuillez réessayer.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Le nouveau mot de passe ne peut pas être identique à votre mot de passe actuel. Veuillez choisir un mot de passe différent.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Le mot de passe a été changé avec succès !");
 
    }
    
}
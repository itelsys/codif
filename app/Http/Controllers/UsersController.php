<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Session;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::where('id', '!=', Auth::id())->paginate(10);
    	return view('utilisateurs.index', compact('users'));
    }

    public function destroy(User $user)
    {
    	$user->delete();
    	return redirect()->back()->with('deleteuser', 'Utilisateur supprimé avec succès');
    	// Session::flash('deleteuser', 'Utilisateur supprimé avec succès');
    }
}

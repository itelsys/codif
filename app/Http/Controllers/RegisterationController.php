<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;

class RegisterationController extends Controller
{
    public function index()
    {
    	return view('registeration.index');
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'optradio' => 'required',
        ]);

        User::create([
            'name' => request('name'),
            'type' => request('optradio'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),     
        ]);
        Session::flash('success', 'Nouveau utilisateur a été bien ajouté');
        return view('registeration.index');

    }

    public function update(Request $request,User $user)
    {
        $id = request('id');

        $name = request('nom');
        $mail = request('email');
        $type = request('type');
        $psw = request('pswd');

        $usr = User::find($id);
        
        if ($name) {
            $usr->name = $name;
        }
        if ($mail) {
            $usr->email = $mail;
        }
        if ($type) {
            $usr->type = $type;
        }
        if ($psw) {
            $usr->password = Hash::make($psw);
        }

        $usr->save();

        Session::flash('userupdate', 'utilisateur bien modifié');

    }
}

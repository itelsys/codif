<?php

namespace App\Http\Controllers;

use App\Actions;
use Illuminate\Http\Request;
use DB;

class ActionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acts = Actions::latest()->paginate(20);
        return view('action.index' ,compact('acts'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actions  $actions
     * @return \Illuminate\Http\Response
     */
    public function show(Actions $actions, Request $request)
    {
        $username = request('nameuser');
        $acti = request('action');
        $code = "%".request('code')."%";
        $condition = "";
        if ($username) {
           $condition = " user_name = '" .$username."' && action LIKE '%Codification%'";
        }

        if ($acti) {
            if(strlen($condition)){
                $condition = " && ".$condition;
            }
            $condition = " action = '".$acti."' ".$condition;
        }
        if ($code) {
            if(strlen($condition)){
                $condition = " && ".$condition;
            }
            $condition = " codech LIKE '".$code."' ".$condition." && action LIKE '%Codification%'";
        }
        
        $action = DB::select('select * from actions where'.$condition);
               
        
        if (!request('nameuser') && !request('action') && !request('code')) {
            return back();
        }

        return view('action.filtreactions', compact('action'));
    }
        
        

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actions  $actions
     * @return \Illuminate\Http\Response
     */
    public function edit(Actions $actions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actions  $actions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actions $actions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actions  $actions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actions $actions)
    {
        //
    }
}

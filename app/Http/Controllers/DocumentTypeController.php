<?php

namespace App\Http\Controllers;

use App\Document_type;
use Illuminate\Http\Request;
use Session;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Document_type::paginate(15);
        return view('document.index', compact('docs'));
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

        Document_type::insert([
            ['nom_doc' => $nom, 'code_doc' => $code]
        ]);

        Session::flash('typdoca', 'Type document bien ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document_type  $document_type
     * @return \Illuminate\Http\Response
     */
    public function show(Document_type $document_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document_type  $document_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Document_type $document_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document_type  $document_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document_type $document_type)
    {
        $id = request('id');
        $nom = request('nom');
        $code = request('code');
        $doc = Document_type::find($id);

        if ($nom) {
            $doc->nom_doc = $nom;
        }
        if ($code) {
            $doc->code_doc = $code;
        }

        $doc->save();

        Session::flash('uptypedoc', 'Type document bien modifié');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document_type  $document_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document_type $document_type)
    {
        $document_type->delete();
        return redirect()->back()->with('deletedoctype', 'Document type supprimé avec succès');
        //return back();
    }
}

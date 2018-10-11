@extends('layouts.master')

@section('content')
<div class="container">
    @if($document)
    <!-- <input type="text" name="" value="{{$document}}"> -->
    @endif
    <div class="row" id="contact">
        <div class="col-sm-8 offset-sm-2">
            @if (session()->has('successcod'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('successcod') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h4 class="text-center">Codifier un document</h4>
            <hr>
            <form  method="POST" action="" id="cpf">
                {{ csrf_field() }}
                <div class="form-group" >
                    <select class="form-control" name="site">
                        <option disabled selected>Site</option>
                        @foreach($sites as $site)
                        <option value="{{$site->code_site}}">{{ $site->nom_site }}</option>
                        @endforeach  
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="projet">
                        <option disabled selected>Code projet</option>
                        @if($pros)
                        @foreach($pros as $pro)
                        <option value="{{$pro->code_projet}}">{{ $pro->nom_projet }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="dep">
                        <option disabled selected>Departement</option>
                        @if($deps)
                        @foreach($deps as $dep)
                        <option value="{{$dep->code_dep}}">{{$dep->nom_dep}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="doc_type">
                        <option disabled selected>Type document</option>
                        @if($docs)
                        @foreach($docs as $doc)
                        <option value="{{$doc->code_doc}}">{{$doc->nom_doc}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <?php $mytime = Carbon\Carbon::now();
                      $year = $mytime->year;
                ?>
                <input type="text" name="date" value="<?php echo $year;?>" hidden>
                <button type="submit" class="btn btn-primary" name="form1">Confirmer</button>
            </form>
            @if($code)
            <form method="POST" action="codification/insertSite" class="mt-5" >
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Code :</label>
                    <div class="col-sm-8 input-group control-group">
                        <input readonly type="text" class="form-control" name="code" value="{{$code}}" id="myInput">
                        <input type="button" class="btn btn-primary mx-sm-2" name="copier" value="Copier" onclick='copyfunction()'>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Lien :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="link">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">valider</button>
                </div>
            </form>
            @endif
        </div>
    </div>
     @if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

@endsection

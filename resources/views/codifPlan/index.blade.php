@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <div class="row" id="contact">
        <div class="col-sm-8 offset-sm-2">
            @if (session()->has('successplan'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session()->get('successplan') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h4 class="text-center">Codifier un plan</h4>
            <hr>
            <form  method="POST" action="" class="" id="cpf">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-control" name="site">
                        <option disabled selected>Site</option>
                        @foreach($sites as $site)
                        <option value="{{$site->code_site}}">{{ $site->nom_site }}</option>
                        @endforeach  
                    </select>
                </div>
                <div class="form-group mx-sm-1">
                    <select class="form-control" name="projet">
                        <option disabled selected>Code projet</option> 
                        @foreach($pros as $pro)
                        <option value="{{$pro->code_projet}}">{{ $pro->nom_projet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mx-sm-1">
                    <select class="form-control" name="ate">
                        <option disabled selected>Atelier</option>
                        @foreach($ats as $at)
                        <option value="{{$at->code_atelier}}">{{$at->nom_atelier}}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group mx-sm-1">
                    <select class="form-control" name="sousate">
                        <option disabled selected>Sous - atelier</option>    
                        @foreach($sousa as $sous)
                        <option value="{{$sous->code_sa}}">{{$sous->nom_sa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mx-sm-1">
                    <select class="form-control" name="equipe">
                        <option disabled selected>Equipement</option>
                        @foreach($equips as $equip)
                        <option value="{{$equip->code_equip}}">{{$equip->nom_equip}}</option>
                        @endforeach
                    </select>
                </div>
                <?php $mytime = Carbon\Carbon::now();
                      $year = $mytime->year;
                ?>
                <input type="text" name="date" value="<?php echo $year;?>" hidden>
                <button type="submit" class="btn btn-primary mx-sm-1" name="form1">Confirmer</button>
            </form>
            @if($code)
            <form method="POST" action="codifPlan/insertPlan" class="mt-5" >
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
                    <button type="submit" class="btn btn-primary mx-sm-2">valider</button>
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Document;
use App\Project;
use App\Site;
use App\Equipement;
use App\Departement;
use App\Document_type;
use App\Atelier;
use App\SousAtelier;
use App\codifPlan;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer(
        //     'layout.nav', 
        //     function($view) {
        //         $view->with('documents', \App\Document::all());
        //     }
        // );
        $sts = Site::all();
        $prj = Project::all();
        $dp =  Departement::all();
        $dt = Document_type::all();
        $ate = Atelier::all();
        $sate = SousAtelier::all();
        $eq = Equipement::all();
        $tmp = codifPlan::pluck('annee');
        $tmpDoc = Document::pluck('annee');
        $tmp = $tmp->unique();
        $tmpDoc = $tmpDoc->unique();
        View::share([
            'sts' => $sts,
            'prj' => $prj,
            'dp' => $dp,
            'dt' => $dt,
            'ate' => $ate,
            'sate' => $sate,
            'eq' => $eq,
            'tmp' => $tmp,
            'tmpDoc' => $tmpDoc,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

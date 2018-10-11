<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodifPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codif_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_site');
            $table->string('code_projet');
            $table->string('code_atelier');
            $table->string('code_ligne');
            $table->string('code_sousa');
            $table->string('code_equip');
            $table->string('code_plan');
            $table->integer('num_plan');
            $table->string('lien');
            $table->string('version');
            $table->timestamps()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codif_plans');
    }
}

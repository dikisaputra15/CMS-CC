<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_propective_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pros_client');
            $table->date('date');
            $table->text('remarks');
            $table->string('client_poc');
            $table->string('poc_cc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_propective_clients');
    }
};

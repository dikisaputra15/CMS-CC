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
        Schema::create('prospective_clients', function (Blueprint $table) {
            $table->id();
            $table->string('nama_client');
            $table->date('date_pro');
            $table->text('remarks_pro');
            $table->string('client_poc_pro');
            $table->string('poc_cc_pro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prospective_clients');
    }
};

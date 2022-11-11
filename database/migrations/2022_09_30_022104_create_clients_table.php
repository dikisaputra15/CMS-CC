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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nama_client');
            $table->string('address');
            $table->date('client_since');
            $table->string('client_poc');
            $table->string('concord_poc');
            $table->string('end_user_poc');
            $table->integer('no_of_subs');
            $table->text('list_of_subs');
            $table->string('contract_no');
            $table->double('contract_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};

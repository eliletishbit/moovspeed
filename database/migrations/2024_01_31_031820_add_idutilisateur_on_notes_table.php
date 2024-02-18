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
        Schema::table('notes', function (Blueprint $table) {
            //
            //rajout attributs de clés etrangères
            $table->unsignedBigInteger('iduser')->nullable()->default(null);
            // ->nullable()->default(null)
            //definition des contraintes relationnelles
            $table->foreign('iduser')->references('id')->on('users')->onDelete('set null');
            
            //autoriser la verif des contraintes de clé
            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            //
            //en cas derollback
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('iduser');
        });
    }
};

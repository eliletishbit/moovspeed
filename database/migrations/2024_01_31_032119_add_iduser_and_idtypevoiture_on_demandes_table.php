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
        Schema::table('demandes', function (Blueprint $table) {
            //rajout attributs de clés etrangères
            $table->unsignedBigInteger('iduser')->nullable()->default(null);
            $table->unsignedBigInteger('idtypevoiture')->nullable()->default(null);

            //definition des contraintes relationnelles
            $table->foreign('iduser')->references('id')->on('users')->onDelete('set null');
            $table->foreign('idtypevoiture')->references('id')->on('typevoitures')->onDelete('set null');
            
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
        Schema::table('demandes', function (Blueprint $table) {
            //en cas derollback
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('iduser');
            $table->dropForeign('idtypevoiture');
            
        });
    }
};

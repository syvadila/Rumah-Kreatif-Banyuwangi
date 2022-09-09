<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisiDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_designs', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi_revisi')->nullable();
            $table->string('foto_revisi')->nullable();
            $table->string('foto_hasil');
            $table->foreignId('design_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisi_designs');
    }
}

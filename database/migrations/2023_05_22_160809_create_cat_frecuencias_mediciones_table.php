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
        Schema::create('cat_frecuencias_mediciones', function (Blueprint $table) {
            $table->engine = ('InnoDB');
            $table->id()->autoIncrement();
            $table->float('valor');
            $table->string('nombre', 50);
            $table->string('descripcion', 512)->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('deleted')->default(0);
            $table->timestamps();
            $table->timestamp('activated_at')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_frecuencias_mediciones');
    }
};

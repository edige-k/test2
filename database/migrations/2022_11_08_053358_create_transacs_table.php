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
        Schema::create('transacs', function (Blueprint $table) {
            $table->id();
            $table->float('amount', 10, 2);
            $table->string('description',255)->nullable();
            $table->enum('status',['CREATED','FAILED','CONFIRMED'])->default('CREATED');
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
        Schema::dropIfExists('transacs');
    }
};

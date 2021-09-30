<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      

        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Unit');
            $table->string('Price');
            $table->string('Min_Color');
            $table->string('Max_Color');
            $table->json('Range');
            $table->string('category');
            $table->json('Item');
            $table->string('multi');
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
        Schema::dropIfExists('tests');
    }
}

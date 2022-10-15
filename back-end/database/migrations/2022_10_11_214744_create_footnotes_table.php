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
        Schema::create('footnotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('number');
            $table->longText('text');
            $table->timestamps();
        });

        Schema::table('footnotes', function (Blueprint $table) {
            $table->foreignId('essay_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footnotes');
    }
};

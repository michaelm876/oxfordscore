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
        Schema::create('hips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->string('chi')->nullable();
            $table->foreignId('consultant_id')->nullable()->constrained()->restrictOnDelete();
            $table->string('joint');
            $table->string('type');
            $table->tinyInteger('bed');
            $table->tinyInteger('car');
            $table->tinyInteger('limping');
            $table->tinyInteger('meal');
            $table->tinyInteger('pain');
            $table->tinyInteger('shopping');
            $table->tinyInteger('socks');
            $table->tinyInteger('spasms');
            $table->tinyInteger('stairs');
            $table->tinyInteger('walking');
            $table->tinyInteger('washing');
            $table->tinyInteger('work');
            $table->boolean('surgery_cancelled')->nullable();
            $table->boolean('surgery_notfv')->nullable();
            $table->date('surgery_date')->nullable();
            $table->string('surgery_type')->nullable();
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
        Schema::dropIfExists('hips');
    }
};

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug',200)->nullable();

            $table->string('meta_title',100)->nullable();
            $table->string('meta_description',200)->nullable();
            
            $table->foreignId('author_id')->references('id')->on('users')->constrained();
        
            $table->string('title',200)->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_code');

            $table->string('status',20);
            $table->string('type',20);
            $table->string('excerpt',200)->nullable();
            
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
        //
    }
};

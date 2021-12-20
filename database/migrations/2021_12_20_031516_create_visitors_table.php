<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('unique_code')->unique();
            $table->string('registration_id')->nullable();
            $table->string('registration_number')->unique();
            $table->string('company')->nullable();
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('designation')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('category')->nullable();
            $table->string('dose_status');
            $table->string('updateStatus')->nullable();
            $table->string('isReplaced')->nullable();
            $table->datetime('post_date')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}

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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->bigInteger('source_bdm')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->string('year')->nullable();
            $table->string('source')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('created_by')->nullable();
            $table->timestamp('updated_by')->nullable();
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
        Schema::dropIfExists('clients');
    }
};

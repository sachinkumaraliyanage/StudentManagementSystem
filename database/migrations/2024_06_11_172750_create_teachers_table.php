<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('nic')->unique();
            $table->enum('name_prefix', ['Mr', 'Mrs', 'Miss', 'Dr', 'Prof', 'Rev', 'Other']);
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('pno')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('address');
            $table->string('school')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('state')->default('1');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

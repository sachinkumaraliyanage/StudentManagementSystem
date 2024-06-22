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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('student_phone')->nullable();
            $table->date('dob');
            $table->string('nic')->nullable();
            $table->string('school')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();

            $table->string('parent_name')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('parent_nic');
            $table->string('parent_email')->unique();


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
        Schema::dropIfExists('students');
    }
};

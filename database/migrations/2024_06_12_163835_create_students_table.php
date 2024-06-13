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
            $table->bigIncrements ('id');
            $table->string ('fname');
            $table->string ('lname');
            $table->enum ('gender', ['Male','Female','Other']);
            $table->string ('studentphone') ->nullable();
            $table->string ('dob');

            $table->string ('Parentname'); 
            $table->string ('ParentPhone');
            $table->string ('ParentAddress');
            $table->string ('ParentNic');

            $table->string ('school');
            $table->string ('grade');
            $table->string ('email') ->unique();

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

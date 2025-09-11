<?php

use App\Models\ClassRombel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('nisn')->unique();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('gender');
            $table->string('phone');
            $table->string('email')->unique();
            $table->foreignIdFor(ClassRombel::class)->nullable();
            $table->timestamps();
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

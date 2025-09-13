<?php

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\ClassRombel;
use App\Models\AcademicYear;
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
        Schema::create('final_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AcademicYear::class);
            $table->string('semester');
            $table->foreignIdFor(ClassRombel::class);
            $table->foreignIdFor(Student::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_grades');
    }
};

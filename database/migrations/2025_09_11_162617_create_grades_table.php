<?php

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRombel;
use App\Models\AcademicYear;
use App\Models\GradeComponents;
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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class);
            $table->foreignIdFor(Subject::class);
            $table->foreignIdFor(ClassRombel::class);
            $table->string('semester');
            $table->decimal('score')->nullable();
            $table->foreignIdFor(AcademicYear::class);
            $table->foreignIdFor(Teacher::class);
            $table->foreignIdFor(GradeComponents::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};

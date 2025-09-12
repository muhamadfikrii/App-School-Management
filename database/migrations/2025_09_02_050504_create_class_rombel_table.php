<?php

use App\Models\Level;
use App\Models\Major;
use App\Models\Teacher;
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
        Schema::create('class_rombel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rombel');
            $table->foreignIdFor(Teacher::class)->nullable();
            $table->foreignIdFor(AcademicYear::class)->nullable();
            $table->foreignIdFor(Level::class);
            $table->foreignIdFor(Major::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_rombel');
    }
};

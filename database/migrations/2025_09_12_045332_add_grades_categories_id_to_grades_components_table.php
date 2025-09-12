<?php

use App\Models\GradeCategories;
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
        Schema::table('grades_components', function (Blueprint $table) {
            $table->foreignIdFor(GradeCategories::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades_components', function (Blueprint $table) {
            //
        });
    }
};

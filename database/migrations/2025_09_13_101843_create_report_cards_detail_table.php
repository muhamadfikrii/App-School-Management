<?php

use App\Models\FinalGrade;
use App\Models\Subject;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_cards_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FinalGrade::class);
            $table->foreignIdFor(Subject::class);
            $table->string('kkm');
            $table->unsignedTinyInteger('final_score');
            $table->string('predicate');
            $table->string('is_passed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_cards_detail');
    }
};

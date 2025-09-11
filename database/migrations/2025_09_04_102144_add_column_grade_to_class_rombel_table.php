<?php

use App\Models\Level;
use App\Models\Major;
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
        Schema::table('class_rombel', function (Blueprint $table) {
            $table->foreignIdFor(Level::class);
            $table->foreignIdFor(Major::class);
            $table->integer('rombel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_rombel', function (Blueprint $table) {
            //
        });
    }
};

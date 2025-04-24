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
        Schema::table('page_sections', function (Blueprint $table) {
            $table->string('subpage')->nullable()->change();
            $table->string('alt')->nullable()->change();
            $table->text('content')->nullable()->change();
            $table->text('elemType')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->string('subpage')->nullable(false)->change();
            $table->string('alt')->nullable(false)->change();
            $table->text('content')->nullable(false)->change();
            $table->text('elemType')->nullable(false)->change();
        });
    }
};

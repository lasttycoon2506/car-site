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
        Schema::table('cars', function (Blueprint $table) {
            $table->tinyText("make");
            $table->tinyText("model");
            $table->tinyText("condition");
            $table->tinyText("transmission");
            $table->tinyText("drive_type");
            $table->unsignedInteger("year");
            $table->unsignedTinyInteger("mpg");
            $table->unsignedInteger("miles");
            $table->unsignedInteger("price");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns("cars", ["make", "model", "condition", "transmission", "drive_type", "year", "mpg", "miles", "price"]);
    }
};

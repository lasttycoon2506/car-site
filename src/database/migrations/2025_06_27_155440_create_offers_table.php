<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Car;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(Car::class, "car_id")->constrained("cars");
            $table->foreignIdFor(User::class, "bidder_id")->constrained("users");

            $table->timestamp("accepted_at")->nullable();
            $table->timestamp("declined_at")->nullable();

            $table->unsignedInteger("amount");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();

            $table->string('city', 45);
            $table->string('publisher_name', 255);

            $table->timestamps();
        });

        $seed = [
            ['city' => 'New York', 'publisher_name' => 'Penguin Random House'],
            ['city' => 'Boston', 'publisher_name' => 'Houghton Mifflin Harcourt'],
            ['city' => 'New Jersey', 'publisher_name' => 'John Wiley and Sons'],
            ['city' => 'New York', 'publisher_name' => 'HarperCollins'],
            ['city' => 'Somerville', 'publisher_name' => 'Candlewick'],
            ['city' => 'New York', 'publisher_name' => 'Workman'],
            ['city' => 'London', 'publisher_name' => 'Macmillan'],
            ['city' => 'New York', 'publisher_name' => 'Simon & Schuster'],
            ['city' => 'Glendale, CA', 'publisher_name' => 'Disney Publishing Worldwide'],
        ];

        DB::table('publishers')->insert($seed);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishers');
    }
};

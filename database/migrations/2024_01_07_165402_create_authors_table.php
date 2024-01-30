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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 45);
            $table->string('last_name', 45);

            $table->timestamps();
        });

        $seed = [
            ['first_name' => 'William', 'last_name' => 'Shakespeare'],
            ['first_name' => 'Agatha', 'last_name' => 'Christie'],
            ['first_name' => 'Barbara', 'last_name' => 'Cartland'],
            ['first_name' => 'Danielle', 'last_name' => 'Steel'],
            ['first_name' => 'J. K.', 'last_name' => 'Rowling'],
            ['first_name' => 'Stephen', 'last_name' => 'King'],
            ['first_name' => 'Paulo', 'last_name' => 'Coelho'],
            ['first_name' => 'Jeffrey', 'last_name' => 'Archer'],
            ['first_name' => 'Edgar', 'last_name' => 'Wallace'],
            ['first_name' => 'Dan', 'last_name' => 'Brown'],
            ['first_name' => 'Nora', 'last_name' => 'Roberts'],
        ];

        DB::table('authors')->insert($seed);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};

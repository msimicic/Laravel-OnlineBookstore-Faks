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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100);
            $table->decimal('price', 5, 2);
            $table->date('publishment_date');
            $table->string('genre', 45)->nullable();

            /*strani ključ*/
            $table->foreignId('publisher_id')->nullable()->constrained('publishers')->onDelete('set null');

            $table->timestamps();
        });

        $seed = [
            ['title' => 'Romeo and Juliet', 'price' => 120.2, 'publishment_date' => '2015-01-01', 'genre' => 'Drama', 'publisher_id' => 1],
            ['title' => 'Murder on the Orient Express', 'price' => 75.5, 'publishment_date' => '2020-05-01', 'genre' => 'Krimi', 'publisher_id' => 2],
            ['title' => 'Duel of Hearts', 'price' => 40, 'publishment_date' => '2019-01-31', 'genre' => 'Ljubavni roman', 'publisher_id' => 3],
            ['title' => 'Upside Down', 'price' => 150.2, 'publishment_date' => '2018-01-12', 'genre' => 'Ljubavni roman', 'publisher_id' => 4],
            ['title' => 'Harry Potter and the Philosopher\'s Stone', 'price' => 100.75, 'publishment_date' => '1997-01-31', 'genre' => 'Znanstvena Fantastika', 'publisher_id' => 5],
            ['title' => 'Fairy Tale', 'price' => 70.3, 'publishment_date' => '1997-01-31', 'genre' => 'Znanstvena Fantastika', 'publisher_id' => 6],
            ['title' => 'The Alchemist', 'price' => 100, 'publishment_date' => '2005-01-12', 'genre' => 'Roman', 'publisher_id' => 7],
            ['title' => 'Kane and Abel', 'price' => 24.4, 'publishment_date' => '2000-04-05', 'genre' => 'Roman', 'publisher_id' => 8],
            ['title' => 'The Four Just Men', 'price' => 55.5, 'publishment_date' => '1905-02-22', 'genre' => 'Triler', 'publisher_id' => 9],
            ['title' => 'The Da Vinci Code', 'price' => 113, 'publishment_date' => '2003-02-22', 'genre' => 'Triler', 'publisher_id' => 2],
            ['title' => 'The Awakening: The Dragon Heart Legacy', 'price' => 53.2, 'publishment_date' => '2020-11-24', 'genre' => 'Ljubavni roman', 'publisher_id' => 5],
        ];

        DB::table('books')->insert($seed);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

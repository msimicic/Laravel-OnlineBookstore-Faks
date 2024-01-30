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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('address', 255);
            $table->string('phone_number', 45)->nullable();

            $table->timestamps();
        });

        $seed = [
            ['first_name' => 'Ivan', 'last_name' => 'Ivić', 'address' => 'Ilica 22', 'phone_number' => '+38591458745'],
            ['first_name' => 'Marko', 'last_name' => 'Markić', 'address' => 'Savska 38', 'phone_number' => '+38595456521'],
            ['first_name' => 'Lea', 'last_name' => 'Leić', 'address' => 'Selska 65', 'phone_number' => '+38592146251'],
            ['first_name' => 'Karlo', 'last_name' => 'Karlović', 'address' => 'Remetinečka 42A', 'phone_number' => '+38591854631'],
            ['first_name' => 'Martin', 'last_name' => 'Martić', 'address' => 'Jarunska 21', 'phone_number' => '+38592624958'],
            ['first_name' => 'Mario', 'last_name' => 'Marić', 'address' => 'Brezovička 80', 'phone_number' => '+38595123654'],
            ['first_name' => 'Katarina', 'last_name' => 'Katić', 'address' => 'Hudobička 12', 'phone_number' => '+38592985465'],
            ['first_name' => 'Josip', 'last_name' => 'Josip', 'address' => 'Selska 5', 'phone_number' => '+38591753573'],
            ['first_name' => 'Helena', 'last_name' => 'Helenić', 'address' => 'Froudeova 33C', 'phone_number' => '+38599789589'],
            ['first_name' => 'Mirko', 'last_name' => 'Mirkić', 'address' => 'Podbrežje VIII 25A', 'phone_number' => '+38598659659'],
            ['first_name' => 'Jasna', 'last_name' => 'Jasnić', 'address' => 'Čazmanska 1', 'phone_number' => '+38597775465'],
        ];

        DB::table('customers')->insert($seed);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

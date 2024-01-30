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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name', 30);
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false)->nullable();

            /* created_at and updated_at */
            $table->timestamps();
        });

        $seed = [[
                'name' => 'Admin Admin',
                'email' => 'admin@online-bookstore.com',
                'password' => bcrypt('admin'), // hashing password
                'is_admin' => true
        ], [
                'name' => 'Ivan Ivić',
                'email' => 'ivanivic@online-bookstore.com',
                'password' => bcrypt('ivanivic'),
                'is_admin' => false
        ], [
                'name' => 'Marko Markić',
                'email' => 'markomarkic@online-bookstore.com',
                'password' => bcrypt('markomarkic'),
                'is_admin' => false
        ], [
                'name' => 'Marina Marić',
                'email' => 'marinamaric@online-bookstore.com',
                'password' => bcrypt('marinamaric'),
                'is_admin' => false
        ], [
                'name' => 'Karlo Karlović',
                'email' => 'karlokarlovic@online-bookstore.com',
                'password' => bcrypt('karlokarlovic'),
                'is_admin' => false
        ], [
                'name' => 'Maja Majić',
                'email' => 'majamajic@online-bookstore.com',
                'password' => bcrypt('majamajic'),
                'is_admin' => false
        ]];

        DB::table('users')->insert($seed);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

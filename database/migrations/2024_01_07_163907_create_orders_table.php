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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->date('order_date');
            $table->decimal('total_price', 10, 2);

            /*strani ključ*/
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');

            $table->timestamps();
        });

        $seed = [
            ['order_date' => '2023-01-01', 'total_price' => 250.5, 'customer_id' => 1],
            ['order_date' => '2023-05-22', 'total_price' => 320, 'customer_id' => 2],
            ['order_date' => '2023-07-05', 'total_price' => 110.2, 'customer_id' => 3],
            ['order_date' => '2023-08-07', 'total_price' => 75, 'customer_id' => 4],
            ['order_date' => '2023-08-05', 'total_price' => 124, 'customer_id' => 5],
            ['order_date' => '2023-09-02', 'total_price' => 83.4, 'customer_id' => 6],
            ['order_date' => '2023-10-12', 'total_price' => 42.7, 'customer_id' => 7],
            ['order_date' => '2023-12-10', 'total_price' => 153, 'customer_id' => 8],
            ['order_date' => '2024-02-03', 'total_price' => 77, 'customer_id' => 9],
            ['order_date' => '2024-02-07', 'total_price' => 46, 'customer_id' => 10],
        ];

        DB::table('orders')->insert($seed);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

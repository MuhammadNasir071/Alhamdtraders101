<?php

use App\Models\Product;
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
            $table->foreignIdFor(Product::class);
            $table->string('name');
            $table->string('email');
            $table->string('contact');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('appartment')->nullable();
            $table->string('quantity');
            $table->string('total_price');
            $table->string('postal_code');
            $table->text('address');
            $table->enum('status', ['pending', 'cancelled', 'completed']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

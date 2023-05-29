<?php

use App\Models\Category;
use App\Models\ShippingType;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(ShippingType::class);
            $table->unsignedInteger('min_price');
            $table->unsignedInteger('max_price');
            $table->string('weight_unit');

            $table->text('details')->nullable();
            $table->boolean('availablity')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

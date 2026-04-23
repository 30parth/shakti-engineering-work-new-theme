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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 500);
            $table->text('description')->nullable();
            $table->string('hsn')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('sales_price', 10, 2)->default(0);
            $table->string('tax_type')->default('exclusive'); // inclusive or exclusive
            $table->decimal('gst', 5, 2)->default(0);
            $table->decimal('cess', 10, 2)->default(0);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
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

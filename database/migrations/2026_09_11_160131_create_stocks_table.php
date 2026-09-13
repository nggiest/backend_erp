<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->uuid('stock_id')->primary();
            $table->foreignUuid('product_id')
                  ->constrained('products', 'id')
                  ->onDelete('cascade');
            $table->numericMorphs('stockable'); 
            $table->decimal('quantity', 18, 2)->default(0);
            $table->timestamps();
            $table->unique(['product_id', 'stockable_type', 'stockable_id']);
        });
        DB::statement("ALTER TABLE stocks ADD CONSTRAINT chk_stocks_stockable_type CHECK (stockable_type IN ('warehouse','branch'))");
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};

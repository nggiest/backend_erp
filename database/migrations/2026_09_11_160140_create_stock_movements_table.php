<?php

use App\Enums\StockMovementType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('stockable_type', 20);
            $table->unsignedBigInteger('stockable_id');
            $table->index(['stockable_type', 'stockable_id']);
            $table->enum('movement_type', array_column(StockMovementType::cases(), 'value'));
            $table->decimal('quantity', 18, 2); // bisa negatif khusus ADJUSTMENT
            $table->string('reason_code', 30)->nullable();
            $table->string('reference_type', 30)->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->index(['reference_type', 'reference_id']);
            $table->timestamp('movement_date')->useCurrent();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT chk_movements_stockable_type CHECK (stockable_type IN ('warehouse','branch'))");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT chk_movements_reason_code CHECK (reason_code IS NULL OR reason_code IN ('Rusak','Kadaluarsa','Hilang','Selisih Opname','Lainnya'))");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT chk_movements_adjustment_reason CHECK (movement_type <> 'ADJUSTMENT' OR reason_code IS NOT NULL)");
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
<?php

namespace App\Enums;
enum StockMovementReasonCodeType: string
{
    case DAMAGED = 'Rusak';
    case EXPIRED = 'Kadaluarsa';
    case LOST = 'Hilang';
    case OPNAME_DIFFERENCE = 'Selisih Opname';
    case OTHER = 'Lainnya';
 
    public function label(): string
    {
        return match ($this) {
            self::DAMAGED => 'Bahan/Barang Rusak',
            self::EXPIRED => 'Kadaluarsa',
            self::LOST => 'Hilang',
            self::OPNAME_DIFFERENCE => 'Selisih Stock Opname',
            self::OTHER => 'Lainnya',
        };
    }
}
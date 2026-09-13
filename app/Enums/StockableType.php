<?php
namespace App\Enums;
enum StockableType:string{
    case WAREHOUSE='warehouse';
    case BRANCH='branch';
    public function label():string{
        return match($this) {
            self::WAREHOUSE => 'Gudang',
            self::BRANCH => 'Cabang',
        };
    }
}
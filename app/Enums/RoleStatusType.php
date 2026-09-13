<?php

namespace App\Enums;

enum RoleStatusType: string
{
    case CASHIER = 'cashier';
    case FINANCE = 'finance';
    case WAREHOUSE = 'warehouse';
    case HR = 'hr';
    case SPV_BRANCH = 'spv_branch';
    case STAFF_WAREHOUSE = 'staff_warehouse';
    case STAFF_BRANCH = 'staff_branch';
    case OWNER = 'Owner';
    case ADMIN = 'Admin';
    case SPV_WAREHOUSE = 'spv_warehouse';

    public function label(): string
    {
        return match($this) {
            self::CASHIER => 'Kasir',
            self::FINANCE => 'Keuangan',
            self::WAREHOUSE => 'Gudang',
            self::HR => 'Human Resource',
            self::SPV_BRANCH => 'SPV Cabang',
            self::STAFF_WAREHOUSE => 'Staff Warehouse',
            self::SPV_WAREHOUSE => 'SPV Gudang',
            self::STAFF_BRANCH => 'Staff Cabang',
            self::OWNER => 'Pemilik',
            self::ADMIN => 'Admin',
        };
    }
}

enum StatusStockTransferShipment: string
{
    case SHIPPED = 'Shipped';
    case PARTIALLY_RECEIVED = 'Partially Received';
    case RECEIVED = 'Received';
 
    public function label(): string
    {
        return match ($this) {
            self::SHIPPED => 'Sudah Dikirim',
            self::PARTIALLY_RECEIVED => 'Diterima Sebagian',
            self::RECEIVED => 'Diterima Lengkap',
        };
    }
}

enum StatusDeliveryPurchase: string
{
    case PAYMENT = 'Payment';
    case PENDING = 'Pending Shipment';
    case SHIPPED = 'Shipped';
    case DELIVERED = 'Delivered';
    case CANCELLED = 'Canceled';
 
    public function label(): string
    {
        return match ($this) {
            self::PAYMENT => 'Menunggu Pembayaran',
            self::PENDING => 'Menunggu Pengiriman',
            self::SHIPPED => 'Sudah Dikirim',
            self::DELIVERED => 'Sudah Diterima',
            self::CANCELLED => 'Dibatalkan',
        };
    }
}
<?php

namespace App\Enums;

enum EnumRoleStatus: string
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

enum CategoryDocument : string{
    case SALES_ORDER = 'Sales Order';
    case DELIVERY_NOTE = 'Delivery Note';
    case WAREHOUSE_INVOICE = 'Warehouse Invoice';
    case RECEIPT_NOTE = 'Receipt Note';
    case VENDOR_INVOICE = 'Vendor Invoice';
    case RECEIPT_INVOICE = 'Receipt Invoice';
}

enum StatusDeliveryPurchase: string{
    case PAYMENT = 'Payment';
    case PENDING = 'Pending Shipment';
    case SHIPPED = 'Shipped';
    case DELIVERED = 'Delivered';
    case CANCELLED = 'Canceled';
}
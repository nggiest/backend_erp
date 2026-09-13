<?php

enum StatusStockTransferRequestType: string
{
    case REQUESTED = 'Requested';
    case APPROVED = 'Approved';
    case REJECTED = 'Rejected';
 
    public function label(): string
    {
        return match ($this) {
            self::REQUESTED => 'Menunggu Persetujuan',
            self::APPROVED => 'Disetujui',
            self::REJECTED => 'Ditolak',
        };
    }
}
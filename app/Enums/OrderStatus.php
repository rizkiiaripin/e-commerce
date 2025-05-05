<?php

namespace App\Enums;

enum OrderStatus : string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
    case Returned = 'returned';
    case Failed = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Menunggu Pembayaran',
            self::Processing => 'Sedang Diproses',
            self::Shipped => 'Telah Dikirim',
            self::Delivered => 'Telah Diterima',
            self::Cancelled => 'Dibatalkan',
            self::Returned => 'Dikembalikan',
            self::Failed => 'Gagal',
        };
    }
}

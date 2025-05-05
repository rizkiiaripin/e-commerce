<?php

namespace App\Enums;

enum PaymentStatus : string
{
    case Unpaid     = 'unpaid';      // Belum dibayar
    case Pending    = 'pending';     // Menunggu konfirmasi dari payment gateway
    case Paid       = 'paid';        // Sudah dibayar
    case Failed     = 'failed';      // Gagal bayar (misalnya error saat transaksi)
    case Refunded   = 'refunded';    // Dana sudah dikembalikan
    case Expired    = 'expired';     // Waktu pembayaran habis
    case Cancelled  = 'cancelled';   // Dibatalkan sebelum dibayar

    // Label Bahasa Indonesia
    public function label(): string
    {
        return match($this) {
            self::Unpaid    => 'Belum Dibayar',
            self::Pending   => 'Menunggu Konfirmasi',
            self::Paid      => 'Sudah Dibayar',
            self::Failed    => 'Gagal Pembayaran',
            self::Refunded  => 'Dana Dikembalikan',
            self::Expired   => 'Kadaluarsa',
            self::Cancelled => 'Dibatalkan',
        };
    }
}

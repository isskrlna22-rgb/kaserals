<?php

namespace App\Exports;

use App\Models\PembayaranKas;
use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'Tanggal',
            'Jenis',
            'Keterangan',
            'Nama Siswa',
            'Nominal',
        ];
    }

    public function array(): array
    {
        $data = [];

        // ================= PEMBAYARAN KAS =================
        $pembayaran = PembayaranKas::with('siswa')
            ->where('status', 'Diterima')
            ->latest('tanggal')
            ->get();

        foreach ($pembayaran as $item) {
            $data[] = [
                $item->tanggal,
                'Pembayaran Kas',
                $item->keterangan ?? 'Pembayaran kas siswa',
                $item->siswa?->nama_lengkap ?? '-',
                $item->nominal,
            ];
        }

        // ================= PENGELUARAN =================
        $pengeluaran = Pengeluaran::latest('tanggal')
            ->get();

        foreach ($pengeluaran as $item) {
            $data[] = [
                $item->tanggal,
                'Pengeluaran',
                $item->keterangan ?? $item->kategori ?? 'Pengeluaran kas',
                '-',
                $item->nominal,
            ];
        }

        return $data;
    }
}

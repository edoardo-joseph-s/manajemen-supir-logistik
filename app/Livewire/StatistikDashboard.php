<?php

namespace App\Livewire;

use App\Models\Supir;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatistikDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSupir = Supir::count();

        // Ambil semua tanggal lahir supir
        $tanggalLahirList = Supir::pluck('tanggal_lahir')->filter();

        // Hitung usia rata-rata
        $usiaRataRata = $tanggalLahirList->count()
            ? round($tanggalLahirList->map(fn($tgl) => Carbon::parse($tgl)->age)->avg(), 1)
            : 0;

        // Tanggal lahir termuda & tertua
        $tanggalLahirTermuda = $tanggalLahirList->max();
        $tanggalLahirTertua = $tanggalLahirList->min();

        return [
            Stat::make('Total Supir', $totalSupir)
                ->description('Jumlah seluruh supir terdaftar')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Usia Rata-rata Supir', $usiaRataRata . ' tahun')
                ->description('Rata-rata usia supir')
                ->descriptionIcon('heroicon-o-user')
                ->color('info'),

            Stat::make('Tanggal Lahir Termuda', $tanggalLahirTermuda ? Carbon::parse($tanggalLahirTermuda)->translatedFormat('d F Y') : '-')
                ->description('Tanggal lahir supir termuda')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('success'),

            Stat::make('Tanggal Lahir Tertua', $tanggalLahirTertua ? Carbon::parse($tanggalLahirTertua)->translatedFormat('d F Y') : '-')
                ->description('Tanggal lahir supir tertua')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('warning'),

            Stat::make('Umur Termuda', $tanggalLahirTermuda ? Carbon::parse($tanggalLahirTermuda)->age . ' tahun' : '-')
                ->description('Umur supir termuda')
                ->descriptionIcon('heroicon-o-user')
                ->color('success'),

            Stat::make('Umur Tertua', $tanggalLahirTertua ? Carbon::parse($tanggalLahirTertua)->age . ' tahun' : '-')
                ->description('Umur supir tertua')
                ->descriptionIcon('heroicon-o-user')
                ->color('warning'),
        ];
    }
}

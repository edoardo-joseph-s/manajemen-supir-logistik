<?php

namespace App\Filament\Resources\JadwalKerjaResource\Pages;

use App\Filament\Resources\JadwalKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalKerjas extends ListRecords
{
    protected static string $resource = JadwalKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

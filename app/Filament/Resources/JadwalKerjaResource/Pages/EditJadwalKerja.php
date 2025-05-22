<?php

namespace App\Filament\Resources\JadwalKerjaResource\Pages;

use App\Filament\Resources\JadwalKerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalKerja extends EditRecord
{
    protected static string $resource = JadwalKerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

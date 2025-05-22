<?php

namespace App\Filament\Resources\RiwayatPerjalananResource\Pages;

use App\Filament\Resources\RiwayatPerjalananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRiwayatPerjalanan extends EditRecord
{
    protected static string $resource = RiwayatPerjalananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

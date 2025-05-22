<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KendaraanResource\Pages;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;
    protected static ?string $navigationLabel = 'Manajemen Kendaraan';
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_polisi')
                    ->label('Nomor Polisi')
                    ->required()
                    ->numeric()
                    ->mask('9999999999999999') // atur jumlah digit sesuai kebutuhan
                    ->rules(['required', 'numeric']),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak_aktif' => 'Tidak Aktif',
                        'servis' => 'Servis',
                        'rusak' => 'Rusak',
                    ])
                    ->required()
                    ->default('aktif'),
                Forms\Components\Select::make('kondisi')
                    ->label('Kondisi')
                    ->options([
                        'baik' => 'Baik',
                        'perlu_servis' => 'Perlu Servis',
                        'rusak_ringan' => 'Rusak Ringan',
                        'rusak_berat' => 'Rusak Berat',
                    ])
                    ->required(),
                Forms\Components\Select::make('jenis')
                    ->label('Jenis Kendaraan')
                    ->options([
                        'mobil' => 'Mobil',
                        'motor' => 'Motor',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_polisi')->label('Nomor Polisi'),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'aktif' => 'success',
                        'tidak_aktif' => 'danger',
                    ]),
                Tables\Columns\TextColumn::make('kondisi')->label('Kondisi'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}

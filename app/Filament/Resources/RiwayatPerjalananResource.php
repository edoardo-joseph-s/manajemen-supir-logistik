<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatPerjalananResource\Pages;
use App\Models\RiwayatPerjalanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RiwayatPerjalananResource extends Resource
{
    protected static ?string $model = RiwayatPerjalanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('supir_id')
                    ->label('Supir')
                    ->relationship('supir', 'nama')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('kendaraan_id')
                    ->label('Kendaraan')
                    ->relationship('kendaraan', 'nomor_polisi')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('tujuan')
                    ->label('Tujuan')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('supir.nama')->label('Supir'),
                Tables\Columns\TextColumn::make('kendaraan.nomor_polisi')->label('Kendaraan'),
                Tables\Columns\TextColumn::make('tujuan'),
                Tables\Columns\TextColumn::make('tanggal')->date(),
                Tables\Columns\TextColumn::make('keterangan')->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRiwayatPerjalanans::route('/'),
            'create' => Pages\CreateRiwayatPerjalanan::route('/create'),
            'edit' => Pages\EditRiwayatPerjalanan::route('/{record}/edit'),
        ];
    }
}

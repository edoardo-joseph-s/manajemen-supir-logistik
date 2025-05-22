<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalKerjaResource\Pages;
use App\Filament\Resources\JadwalKerjaResource\RelationManagers;
use App\Models\JadwalKerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalKerjaResource extends Resource
{
    protected static ?string $model = JadwalKerja::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Select::make('supir_id')
                    ->label('Supir')
                    ->relationship('supir', 'nama')
                    ->searchable()
                    ->required(),
                \Filament\Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('shift')
                    ->label('Shift')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalKerjas::route('/'),
            'create' => Pages\CreateJadwalKerja::route('/create'),
            'edit' => Pages\EditJadwalKerja::route('/{record}/edit'),
        ];
    }
}

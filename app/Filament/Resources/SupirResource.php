<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupirResource\Pages;
use App\Filament\Resources\SupirResource\RelationManagers\JadwalKerjasRelationManager;
use App\Models\Supir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SupirResource extends Resource
{
    protected static ?string $model = Supir::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Supir';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->numeric()
                    ->mask('9999999999999999'), // Max 16 digits
                Forms\Components\TextInput::make('no_sim')
                    ->required()
                    ->numeric()
                    ->mask('999999999999'), // Adjust SIM length as needed
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->numeric()
                    ->mask('999999999999'), // Max 12 digits
                Forms\Components\Textarea::make('alamat')->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->required()
                    ->default('active'),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik')->label('NIK'),
                Tables\Columns\TextColumn::make('nama')->label('Nama'),
                Tables\Columns\TextColumn::make('tanggal_lahir')->label('Tanggal Lahir'),
                Tables\Columns\TextColumn::make('umur')->label('Umur'),
                // ...kolom lain...
            ]);
    }

    public static function getRelations(): array
    {
        return [
            JadwalKerjasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSupirs::route('/'),
            'create' => Pages\CreateSupir::route('/create'),
            'edit' => Pages\EditSupir::route('/{record}/edit'),
        ];
    }
}

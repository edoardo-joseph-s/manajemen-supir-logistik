<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupirResource\Pages;
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
                Forms\Components\TextInput::make('nik')->required(),
                Forms\Components\TextInput::make('no_sim')->required(),
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('no_hp')->required(),
                Forms\Components\Textarea::make('alamat')->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Nonaktif',
                    ])
                    ->required()
                    ->default('aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->label('Nama'),
                Tables\Columns\TextColumn::make('no_hp')->label('No HP'),
                // Tambahkan kolom lain sesuai kebutuhan
            ]);
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

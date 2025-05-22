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
                Tables\Columns\TextColumn::make('supir.nama')
                    ->label('Nama Supir')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d F Y')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('shift')
                    ->label('Shift')
                    ->colors([
                        'Pagi' => 'success',
                        'Siang' => 'info',
                        'Malam' => 'warning',
                    ])
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('shift')
                    ->label('Filter Shift')
                    ->options([
                        'Pagi' => 'Pagi',
                        'Siang' => 'Siang',
                        'Malam' => 'Malam',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Ubah'),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Terpilih'),
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

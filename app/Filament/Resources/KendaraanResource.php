<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KendaraanResource\Pages;
use App\Models\Kendaraan;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;
    protected static ?string $navigationLabel = 'Manajemen Kendaraan';
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nomor_polisi')
                    ->label('Nomor Polisi')
                    ->required()
                    ->maxLength(14)
                    ->rules(['regex:/^[0-9]{1,14}$/']) // hanya angka, maksimal 14 digit
                    ->helperText('Maksimal 14 angka'),
                Select::make('jenis')
                    ->label('Jenis Kendaraan')
                    ->options([
                        'mobil' => 'Mobil',
                        'motor' => 'Motor',
                        'truk' => 'Truk',
                    ])
                    ->required(),
                Select::make('merk')
                    ->label('Merk')
                    ->options([
                        'toyota' => 'Toyota',
                        'honda' => 'Honda',
                        'isuzu' => 'Isuzu',
                        'mitsubishi' => 'Mitsubishi',
                        'suzuki' => 'Suzuki',
                        'daihatsu' => 'Daihatsu',
                        'fuso' => 'Fuso',
                        'hino' => 'Hino',
                        'lainnya' => 'Lainnya',
                    ])
                    ->searchable()
                    ->required(),
                Select::make('tahun')
                    ->label('Tahun')
                    ->options(collect(range(date('Y'), 2015))->mapWithKeys(fn($y) => [$y => $y])->toArray())
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'aktif' => 'Aktif',
                        'tidak_aktif' => 'Tidak Aktif',
                        'servis' => 'Servis',
                        'rusak' => 'Rusak',
                    ])
                    ->required()
                    ->default('aktif'),
                Select::make('kondisi')
                    ->label('Kondisi')
                    ->options([
                        'baik' => 'Baik',
                        'perlu_servis' => 'Perlu Servis',
                        'rusak_ringan' => 'Rusak Ringan',
                        'rusak_berat' => 'Rusak Berat',
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

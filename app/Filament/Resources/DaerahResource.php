<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaerahResource\Pages;
use App\Filament\Resources\DaerahResource\RelationManagers;
use App\Models\Daerah;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaerahResource extends Resource
{
    protected static ?string $model = Daerah::class;

    protected static ?string $navigationIcon = 'mdi-home-group';

    protected static ?string $navigationGroup = 'Data Master';
    
    protected static ?int $navigationSort = 1;

    protected static ?string $pluralModelLabel = 'Daerah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Daerah yang Dekat dari Wilayah Konservasi Penyu')
                    ->description('')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Daerah')
                            ->placeholder('Masukkan Nama Daerah')
                            ->columnSpanFull(),
                        TextInput::make('jarak')
                            ->label('Jarak Daerah')
                            ->prefix('- +')
                            ->suffix('Km')
                            ->placeholder('Masukkan Jarak Daerah dari Wilayah Konservasi'),
                        TextInput::make('populasi')
                            ->label('Populasi pada Daerah')
                            ->prefix('- +')
                            ->suffix('Orang')
                            ->placeholder('Masukkan Populasi dari Daerah yang di input'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('nama'),
                TextColumn::make('jarak')
                    ->prefix('-+  ')
                    ->suffix(' km'),
                TextColumn::make('populasi')
                    ->prefix('-+  ')
                    ->suffix(' orang'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListDaerahs::route('/'),
            'create' => Pages\CreateDaerah::route('/create'),
            'edit' => Pages\EditDaerah::route('/{record}/edit'),
        ];
    }
}

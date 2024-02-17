<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Kuesioner1Resource\Pages;
use App\Filament\Resources\Kuesioner1Resource\RelationManagers;
use App\Models\Kuesioner1;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Kuesioner1Resource extends Resource
{
    protected static ?string $model = Kuesioner1::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Pages\ListKuesioner1s::route('/'),
            'create' => Pages\CreateKuesioner1::route('/create'),
            'edit' => Pages\EditKuesioner1::route('/{record}/edit'),
        ];
    }
}

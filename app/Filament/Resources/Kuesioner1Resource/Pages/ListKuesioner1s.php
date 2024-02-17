<?php

namespace App\Filament\Resources\Kuesioner1Resource\Pages;

use App\Filament\Resources\Kuesioner1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKuesioner1s extends ListRecords
{
    protected static string $resource = Kuesioner1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

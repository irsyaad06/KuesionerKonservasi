<?php

namespace App\Filament\Resources\Kuesioner1Resource\Pages;

use App\Filament\Resources\Kuesioner1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuesioner1 extends EditRecord
{
    protected static string $resource = Kuesioner1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Resources\DaerahResource\Pages;

use App\Filament\Resources\DaerahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDaerah extends CreateRecord
{
    protected static string $resource = DaerahResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

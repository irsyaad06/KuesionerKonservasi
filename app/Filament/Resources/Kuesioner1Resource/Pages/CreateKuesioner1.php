<?php

namespace App\Filament\Resources\Kuesioner1Resource\Pages;

use App\Filament\Resources\Kuesioner1Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKuesioner1 extends CreateRecord
{
    protected static string $resource = Kuesioner1Resource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

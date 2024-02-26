<?php

namespace App\Filament\Widgets;

use App\Models\Kuesioner1;
use App\Models\Daerah;
use App\Models\Role;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static ?string $pollingInterval = '10s';
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Responden', Kuesioner1::count())
                ->descriptionIcon('mdi-home-group')
                ->color('success')
                ->chart([]),
        
            Stat::make('Daerah yang terdaftar', Daerah::count())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                // ->color('success')
                // ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ,
            Stat::make('Daerah yang terdaftar', Role::count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->color('success')
            // ->chart([7, 3, 4, 5, 6, 3, 5, 3])
            ,
        ];
    }
}

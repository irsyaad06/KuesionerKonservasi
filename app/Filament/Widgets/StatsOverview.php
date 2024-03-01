<?php

namespace App\Filament\Widgets;

use App\Models\Kuesioner1;
use App\Models\Daerah;
use App\Models\Role;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 0;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Responden', Kuesioner1::count())
                ->descriptionIcon('mdi-home-group')
                ->color('success')
                ->chart([]),
        
            Stat::make('Daerah Yang Terdaftar', Daerah::count())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                // ->color('success')
                // ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ,
            Stat::make('Role Yang Terdaftar', Role::count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            // ->color('success')
            // ->chart([7, 3, 4, 5, 6, 3, 5, 3])
            ,
        ];
    }
}

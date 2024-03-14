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
                ->chart([])
                ->chart([1, 3, 6, 2, 7, 4, 2, 1]),
        
            Stat::make('Daerah Yang Terdaftar', Daerah::count())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('warning')
                ->chart([6, 2, 5, 7, 1, 2, 1, 1])
                ,
            Stat::make('Role Yang Terdaftar', Role::count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('info')
            ->chart([1,2,1])
            ,
        ];
    }
}

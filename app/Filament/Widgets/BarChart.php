<?php

namespace App\Filament\Widgets;

use App\Models\Role;
use App\Models\Kuesioner1;
use Filament\Widgets\ChartWidget;

class BarChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Responden Berdasarkan Role';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $roles = Role::all();

        $roleCounts = [];
        $labels = [];

        foreach ($roles as $role) {
            $roleCounts[$role->nama_role] = Kuesioner1::where('role_id', $role->id)->count();
            $labels[] = $role->nama_role;
        }


        $datasets[] = [
            'label' => 'Responden',
            'data' => array_values($roleCounts),
        ];

        return [
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

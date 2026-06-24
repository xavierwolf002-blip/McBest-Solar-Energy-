<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Lead;
use App\Models\Review;
use App\Models\Project;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Leads', Lead::count())
                ->description('32% increase this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
                
            Stat::make('Total Projects', Project::count())
                ->description('Active solar installations')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('primary')
                ->chart([3, 5, 4, 7, 6, 8, 10]),
                
            Stat::make('Pending Reviews', Review::where('is_approved', false)->count())
                ->description('Requires your attention')
                ->descriptionIcon('heroicon-m-exclamation-circle')
                ->color('warning')
                ->chart([1, 2, 0, 1, 3, 2, 4]),
                
            Stat::make('Total Reviews', Review::where('is_approved', true)->count())
                ->description('Approved customer reviews')
                ->descriptionIcon('heroicon-m-star')
                ->color('success')
                ->chart([15, 18, 22, 20, 25, 24, 28]),
        ];
    }
}

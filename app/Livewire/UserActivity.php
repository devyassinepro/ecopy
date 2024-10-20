<?php

namespace App\Livewire;

use App\Models\UserLoginActivity;
use Browser;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UserActivity extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make(__('Event'), 'event')
                ->sortable()
                ->searchable(),
            Column::make(__('IP address'), 'ip_address')
                ->sortable(),
            Column::make(__('Browser')),
            Column::make(__('Device / OS')),
            Column::make('Date', 'created_at')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return UserLoginActivity::whereUserId(auth()->user()->id);
    }

    public function rowView(): string
    {
        return 'livewire.user-activity';
    }
}

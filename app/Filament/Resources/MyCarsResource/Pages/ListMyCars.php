<?php

namespace App\Filament\Resources\MyCarsResource\Pages;

use App\Filament\Resources\MyCarsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyCars extends ListRecords
{
    protected static string $resource = MyCarsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

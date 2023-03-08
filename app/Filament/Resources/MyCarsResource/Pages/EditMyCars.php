<?php

namespace App\Filament\Resources\MyCarsResource\Pages;

use App\Filament\Resources\MyCarsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyCars extends EditRecord
{
    protected static string $resource = MyCarsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

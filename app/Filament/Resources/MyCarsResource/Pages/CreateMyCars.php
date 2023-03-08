<?php

namespace App\Filament\Resources\MyCarsResource\Pages;

use App\Filament\Resources\MyCarsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyCars extends CreateRecord
{
    protected static string $resource = MyCarsResource::class;
}

<?php

namespace App\Filament\Resources\CarResource\Pages;

use App\Filament\Resources\CarResource;
use Domain\Brand\Actions\CreateCarAction;
use Domain\Brand\DataTransferObjects\BrandData;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateCar extends CreateRecord
{
    protected static string $resource = CarResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(fn () => app(CreateCarAction::class)->execute(new BrandData(...$data)));
    }
}

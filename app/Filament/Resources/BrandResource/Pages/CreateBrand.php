<?php

namespace App\Filament\Resources\BrandResource\Pages;

use App\Filament\Resources\BrandResource;
use Domain\Brand\Actions\CreateBrandAction;
use Domain\Brand\DataTransferObjects\BrandData;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(fn () => app(CreateBrandAction::class)->execute(new BrandData(...$data)));
    }
}

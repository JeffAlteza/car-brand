<?php

declare(strict_types=1);

namespace Domain\Brand\Actions;

use Domain\Brand\DataTransferObjects\BrandData;
use Domain\Brand\Models\Brand;

class UpdateBrandAction
{
    public function execute(Brand $brand, BrandData $brandData): Brand
    {
        /** @var Brand $brand */
        $brand->update($this->getBrandAttributes($brandData));

        return $brand;
    }

    public function getBrandAttributes(BrandData $brandData): array
    {
        return array_filter([
            'name' => $brandData->name,
        ]);
        fn ($value) => filled($value);
    }
}

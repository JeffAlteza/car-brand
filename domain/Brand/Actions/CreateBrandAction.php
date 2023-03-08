<?php

declare(strict_types=1);

namespace Domain\Brand\Actions;

use Domain\Brand\DataTransferObjects\BrandData;
use Domain\Brand\Models\Brand;

class CreateBrandAction
{
    public function execute(BrandData $brandData): Brand
    {
        /** @var Brand $brand */
        $brand = Brand::create(array_filter([
            'name' => $brandData->name,
        ]));
        return $brand;
    }
}

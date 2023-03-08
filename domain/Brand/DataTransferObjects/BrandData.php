<?php

declare(strict_types=1);

namespace Domain\Brand\DataTransferObjects;

class BrandData
{
    /** @param  array<int>  $permissions */
    public function __construct(
        public readonly string $name,
    ) {
    }
}

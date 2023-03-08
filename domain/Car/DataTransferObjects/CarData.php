<?php

declare(strict_types=1);

namespace Domain\Car\DataTransferObjects;

class CarData
{
    /** @param  array<int>  $permissions */
    public function __construct(
        public readonly string $name,
        public readonly int $price,
        public readonly string $description,
        public readonly ?string $image,
    ) {
    }
}

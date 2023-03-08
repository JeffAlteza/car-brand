<?php

declare(strict_types=1);

namespace Domain\Brand\Actions;

use Domain\Car\DataTransferObjects\CarData;
use Domain\Car\Models\Car;

class CreateCarAction
{
    public function execute(CarData $carData): Car
    {
        /** @var Car $car */
        $car = Car::create(array_filter([
            'name' => $carData->name,
            'price' => $carData->price,
            'description' => $carData->description,
            'image' => $carData->image,
        ]));
        return $car;
    }
}

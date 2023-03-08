<?php

declare(strict_types=1);

namespace Domain\Brand\Actions;

use Domain\Car\DataTransferObjects\CarData;
use Domain\Car\Models\Car;

class UpdateCarAction
{
    public function execute(Car $car, CarData $carData): Car
    {
        /** @var Car $car */
        $car->update(array_filter([
            'name' => $carData->name,
            'price' => $carData->price,
            'description' => $carData->description,
            'image' => $carData->image,
        ]));

        return $car;
    }
}

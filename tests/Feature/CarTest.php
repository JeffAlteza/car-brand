<?php

use App\Filament\Resources\CarResource;
use App\Models\Car;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can render page', function () {
    $this->get(CarResource::getUrl('index'))->assertStatus(302);
});

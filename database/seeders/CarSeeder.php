<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the top 10 car brands
       $brands = Brand::limit(10)->get();

       // Array of car names for each brand
       $carNames = [
           "Toyota" => [
               "Camry", "Corolla", "Prius", "RAV4", "Highlander",
               "Tacoma", "Tundra", "Sienna", "Yaris", "Avalon"
           ],
           "Volkswagen" => [
               "Golf", "Jetta", "Passat", "Tiguan", "Atlas",
               "Polo", "T-Roc", "Touareg", "Arteon", "Up!"
           ],
           "Hyundai" => [
               "Elantra", "Sonata", "Tucson", "Santa Fe", "Kona",
               "Seltos", "Sportage", "Rio", "Forte", "Stinger"
           ],
           "General Motors" => [
               "Chevrolet Silverado", "Chevrolet Equinox", "Chevrolet Malibu", "Chevrolet Camaro", "Buick Encore",
               "Buick Enclave", "GMC Sierra", "GMC Terrain", "Cadillac Escalade", "Cadillac CT4"
           ],
           "Ford" => [
               "F-150", "Escape", "Explorer", "Edge", "Fusion",
               "Mustang", "Bronco", "Ranger", "Transit", "EcoSport"
           ],
           "Honda" => [
               "Civic", "Accord", "CR-V", "Pilot", "HR-V",
               "Odyssey", "Ridgeline", "Passport", "Clarity", "Fit"
           ],
           "Nissan" => [
               "Altima", "Sentra", "Rogue", "Pathfinder", "Murano",
               "Frontier", "Maxima", "Kicks", "Versa", "Armada"
           ],
           "Fiat" => [
               "Ram 1500", "Jeep Grand Cherokee", "Dodge Charger", "Dodge Challenger", "Jeep Wrangler",
               "Jeep Cherokee", "Chrysler Pacifica", "Dodge Durango", "Fiat 500", "Alfa Romeo Giulia"
           ],
           "BMW" => [
               "3 Series", "5 Series", "X3", "X5", "7 Series",
               "2 Series", "4 Series", "X7", "8 Series", "Z4"
           ],
           "Renault" => [
               "Clio", "Captur", "Megane", "Kadjar", "Duster",
               "Zoe", "Talisman", "Twingo", "Koleos", "Scenic"
           ],
       ];

       // Loop through each brand and create 10 cars for each
       $faker = Faker::create();
       foreach ($brands as $brand) {
           $brandId = $brand->id;
           $cars = $carNames[$brand->name];
           $carDescription = $faker->unique()->text(100); 
           $imagePath = $faker->image(public_path('storage/car-images'), 50, 50, null, false);
           foreach ($cars as $carName) {
               $carPrice = rand(20000, 50000); // Random price between 20,000 and 50,000
               Car::create([
                   'name' => $carName,
                   'price' => $carPrice,
                   'description' => $carDescription,
                   'brand_id' => $brandId,
                   'image' => 'car-images/' . basename($imagePath),
               ]);
            }
        }
    }
}

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
               "Camry", "Corolla", "Prius", "RAV4", "Highlander",
               "Tacoma", "Tundra", "Sienna", "Yaris", "Avalon",
               "Golf", "Jetta", "Passat", "Tiguan", "Atlas",
               "Polo", "T-Roc", "Touareg", "Arteon", "Up!",
               "Elantra", "Sonata", "Tucson", "Santa Fe", "Kona",
               "Seltos", "Sportage", "Rio", "Forte", "Stinger",
               "Chevrolet Silverado", "Chevrolet Equinox", "Chevrolet Malibu", "Chevrolet Camaro", "Buick Encore",
               "Buick Enclave", "GMC Sierra", "GMC Terrain", "Cadillac Escalade", "Cadillac CT4",
               "F-150", "Escape", "Explorer", "Edge", "Fusion",
               "Mustang", "Bronco", "Ranger", "Transit", "EcoSport",
               "Civic", "Accord", "CR-V", "Pilot", "HR-V",
               "Odyssey", "Ridgeline", "Passport", "Clarity", "Fit",
               "Altima", "Sentra", "Rogue", "Pathfinder", "Murano",
               "Frontier", "Maxima", "Kicks", "Versa", "Armada",
               "Ram 1500", "Jeep Grand Cherokee", "Dodge Charger", "Dodge Challenger", "Jeep Wrangler",
               "Jeep Cherokee", "Chrysler Pacifica", "Dodge Durango", "Fiat 500", "Alfa Romeo Giulia",
               "3 Series", "5 Series", "X3", "X5", "7 Series",
               "2 Series", "4 Series", "X7", "8 Series", "Z4",
               "Clio", "Captur", "Megane", "Kadjar", "Duster",
               "Zoe", "Talisman", "Twingo", "Koleos", "Scenic",
       ];

           foreach ($carNames as $cars) {
               $carPrice = rand(20000, 50000); // Random price between 20,000 and 50,000
               $carDescription = fake()->sentence(rand(2, 5));
               Car::create([
                   'name' => $cars,
                   'price' => $carPrice,
                   'description' => $carDescription
               ]);
            }
        }
    }


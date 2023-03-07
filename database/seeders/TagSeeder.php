<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Sleek',
            'Angular',
            'Aerodynamic',
            'Compact',
            'Sporty',
            'Box-shaped',
            'Curvy',
            'Streamlined',
            'Low-slung',
            'Roomy',
        ];
        foreach($tags as $tag){
            Tag::create([
                'name' => $tag,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

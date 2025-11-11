<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Office::create([
            'name' => 'Tech Solutions Inc.',
            'location' => 'San Francisco, CA',
            'description' => 'Leading technology company specializing in software development and innovation.'
        ]);

        Office::create([
            'name' => 'Digital Marketing Agency',
            'location' => 'New York, NY',
            'description' => 'Full-service digital marketing agency helping brands grow their online presence.'
        ]);

        Office::create([
            'name' => 'Healthcare Systems',
            'location' => 'Boston, MA',
            'description' => 'Innovative healthcare technology company focused on patient care solutions.'
        ]);
    }
}

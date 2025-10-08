<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pricing::create(['name' => 'Harga Kamar - Medium', 'value' => 150000]);
        Pricing::create(['name' => 'Harga Kamar - Large', 'value' => 150000]);
        Pricing::create(['name' => 'Extra Makan', 'value' => 50000]);
        Pricing::create(['name' => 'Extra Kasur', 'value' => 75000]);
    }
}

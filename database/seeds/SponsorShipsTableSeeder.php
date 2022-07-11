<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'type' => 'Gold',
                'price' => 9.99,
                'duration' => 144,
                'img' => "uploads/ads-gold.svg"
            ],
            [
                'type' => 'Silver',
                'price' => 5.99,
                'duration' => 72,
                 'img' => "uploads/ads-silver.svg"
            ],
            [
                'type' => 'Bronze',
                'price' => 2.99,
                'duration' => 24,
                'img' => "uploads/ads-bronze.svg"
            ],
        ];
        foreach ($sponsorships as $sponsorship) {
            $newsponsorship = new Sponsorship();
            $newsponsorship->type = $sponsorship['type'];
            $newsponsorship->price = $sponsorship['price'];
            $newsponsorship->duration = $sponsorship['duration'];
            $newsponsorship->img = $sponsorship['img'];
            $newsponsorship->save();
        }
    }
}

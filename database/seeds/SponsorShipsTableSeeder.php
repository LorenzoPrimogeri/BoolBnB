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
                'duration' => 144
            ],
            [
                'type' => 'Silver',
                'price' => 5.99,
                'duration' => 72
            ],
            [
                'type' => 'Bronze',
                'price' => 2.99,
                'duration' => 24
            ],
        ];
        foreach ($sponsorships as $sponsorship) {
            $newsponsorship = new Sponsorship();
            $newsponsorship->type = $sponsorship['type'];
            $newsponsorship->price = $sponsorship['price'];
            $newsponsorship->duration = $sponsorship['duration'];
            $newsponsorship->save();
        }
    }
}

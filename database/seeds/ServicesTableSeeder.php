<?php

use App\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Wi-Fi', 'Posto Macchina', 'Piscina', 'Sauna', 'Bagno Privato', 'Doccia', 'Asciugamani'];
        foreach ($services as $service) {
            $newservice = new Service();
            $newservice->name = $service;
            $newservice->slug = Str::slug($service);
            $newservice->save();
        }
    }
}

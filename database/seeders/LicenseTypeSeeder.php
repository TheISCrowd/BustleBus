<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //populate the database table with the required License codes, Descptions and classifications
        DB::table('Licenses')->insert([
            'licenseCode' => 'B',
            'licenseDescription' => 'Any vehicle under 3500 kg (exc. motorcycles) and a trailer under 750 kgs',
            'licenseClassification' => 'Light Motor Vehicles',
        ]);

        DB::table('Licenses')->insert([
            'licenseCode' => 'EB',
            'licenseDescription' => 'Any vehicle under 3500 kg (exc. motorcycles) and a trailer weighing greater than 750 kgs. Includes code B',
            'licenseClassification' => 'Light Motor Vehicles',
        ]);

        DB::table('Licenses')->insert([
            'licenseCode' => 'C1',
            'licenseDescription' => 'Buses and goods vehicles with GVM greater than 16,000 kg. A trailer with GVM of 750 kg or less may be attached. Includes code B',
            'licenseClassification' => 'Light Motor Vehicles',
        ]);

        DB::table('Licenses')->insert([
            'licenseCode' => 'C',
            'licenseDescription' => 'Buses and goods vehicles with GVM greater than 16,000 kg. A trailer with GVM of 750 kg or less may be attached. Includes code B and C1 ',
            'licenseClassification' => 'Heavy Motor Vehicles',
        ]);

        DB::table('Licenses')->insert([
            'licenseCode' => 'EC1',
            'licenseDescription' => 'Articulated vehicles with GCM between 3,500 kg and 16,000 kg; and vehicles allowed by Code C1 but with a trailer with GVM greater than 750 kg. Includes code B, EB and C1',
            'licenseClassification' => 'Heavy Motor Vehicles',
        ]);

        DB::table('Licenses')->insert([
            'licenseCode' => 'EC',
            'licenseDescription' => 'Articulated vehicles with GCM greater than 18,000 kg; and vehicles allowed by Code C but with a trailer with GVM greater than 750 kg. Includes code B, EB, C1 and EC1',
            'licenseClassification' => 'Heavy Motor Vehicles',
        ]);
        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = [
            ['code' => '030', 'name' => 'Baringo'],
            ['code' => '036', 'name' => 'Bomet'],
            ['code' => '039', 'name' => 'Bungoma'],
            ['code' => '040', 'name' => 'Busia'],
            ['code' => '028', 'name' => 'Elgeyo Marakwet'],
            ['code' => '014', 'name' => 'Embu'],
            ['code' => '007', 'name' => 'Garissa'],
            ['code' => '043', 'name' => 'Homa Bay'],
            ['code' => '011', 'name' => 'Isiolo'],
            ['code' => '034', 'name' => 'Kajiado'],
            ['code' => '037', 'name' => 'Kakamega'],
            ['code' => '035', 'name' => 'Kericho'],
            ['code' => '022', 'name' => 'Kiambu'],
            ['code' => '003', 'name' => 'Kilifi'],
            ['code' => '020', 'name' => 'Kirinyaga'],
            ['code' => '045', 'name' => 'Kisii'],
            ['code' => '042', 'name' => 'Kisumu'],
            ['code' => '015', 'name' => 'Kitui'],
            ['code' => '002', 'name' => 'Kwale'],
            ['code' => '031', 'name' => 'Laikipia'],
            ['code' => '005', 'name' => 'Lamu'],
            ['code' => '016', 'name' => 'Machakos'],
            ['code' => '017', 'name' => 'Makueni'],
            ['code' => '009', 'name' => 'Mandera'],
            ['code' => '012', 'name' => 'Meru'],
            ['code' => '044', 'name' => 'Migori'],
            ['code' => '010', 'name' => 'Marsabit'],
            ['code' => '001', 'name' => 'Mombasa'],
            ['code' => '021', 'name' => 'Muranga'],
            ['code' => '047', 'name' => 'Nairobi'],
            ['code' => '032', 'name' => 'Nakuru'],
            ['code' => '029', 'name' => 'Nandi'],
            ['code' => '033', 'name' => 'Narok'],
            ['code' => '046', 'name' => 'Nyamira'],
            ['code' => '018', 'name' => 'Nyandarua'],
            ['code' => '019', 'name' => 'Nyeri'],
            ['code' => '025', 'name' => 'Samburu'],
            ['code' => '041', 'name' => 'Siaya'],
            ['code' => '006', 'name' => 'Taita Taveta'],
            ['code' => '004', 'name' => 'Tana River'],
            ['code' => '013', 'name' => 'Tharaka Nithi'],
            ['code' => '026', 'name' => 'Trans Nzoia'],
            ['code' => '023', 'name' => 'Turkana'],
            ['code' => '027', 'name' => 'Uasin Gishu'],
            ['code' => '038', 'name' => 'Vihiga'],
            ['code' => '008', 'name' => 'Wajir'],
            ['code' => '024', 'name' => 'West Pokot'],
        ];

        DB::table('counties')->insert($counties);

        $sub_counties = [
            ['code' => '030', 'name' => '']
        ];

        DB::table('sub_counties')->insert($sub_counties);
    }
}

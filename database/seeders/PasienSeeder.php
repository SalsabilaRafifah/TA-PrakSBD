<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $jenisKelamin = ['perempuan', 'laki-laki'];

        for($i=1; $i<=20; $i++){
            DB::table('pasien')->insert([
                'nama' => $faker->name,
                'telepon' => $faker->unixTime($max = 'now'),
                'nomor_identitas' => $faker->jobTitle,
                'jenis_kelamin' => $faker->randomElement($jenisKelamin),
                'alamat' => $faker->city,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
                ]);
        }
    }
}

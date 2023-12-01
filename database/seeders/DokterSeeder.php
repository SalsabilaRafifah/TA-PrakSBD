<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('id_ID');
         
         for($i=1; $i<=20; $i++){
             DB::table('dokter')->insert([
                 'nama' => $faker->name,
                 'spesialis' => $faker->jobTitle,
                 'telepon' => $faker->unixTime($max = 'now'),
                 'alamat' => $faker->city,
                 'created_at' => date('Y-m-d H:i:s'),
                 'updated_at' => date('Y-m-d H:i:s')
                 ]);
         }
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            $kategori = ['Komputer', 'Keuangan', 'Sains', 'Agama'];
            $kategori_rand = array_rand($kategori, 1);

            $id = DB::table('buku')->insertGetId(
                [
                    'judul' => $faker->word(),
                    'penulis' => $faker->word(),
                    'penerbit' => $faker->word(),
                    'kategori' => $kategori[$kategori_rand],
                    'jumlah' => $faker->numberBetween(1, 100),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );

            DB::table('bukus')->where('id_buku', $id);
                
                
        }
    }
};
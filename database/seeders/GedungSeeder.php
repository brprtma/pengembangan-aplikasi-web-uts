<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gedungs')->insert([
            'kode_gedung' => 'B1',
            'lantai' => '2',
            'mall' => 'Galaxy Mall'
        ]);
    }
}

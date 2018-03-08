<?php

use Illuminate\Database\Seeder;

class BantenprovKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovKegiatanSeederKegiatan::class);
    }
}

<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\Kegiatan\Models\Bantenprov\Kegiatan\Kegiatan;

class BantenprovKegiatanSeederKegiatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $kegiatans = (object) [
            (object) [
                'label' => 'Kegiatan 1',
                'description' => 'Kegiatan 1',
                'tanggal_mulai' => '2018-06-12',
                'tanggal_selesai' => '2018-06-22'
            ],
            (object) [
                'label' => 'Kegiatan 2',
                'description' => 'Kegiatan 2',
                'tanggal_mulai' => '2018-06-12',
                'tanggal_selesai' => '2018-06-22'
            ]
        ];

        foreach ($kegiatans as $kegiatan) {
            $model = Kegiatan::updateOrCreate(
                [
                    'label' => $kegiatan->label,
                    'description' => $kegiatan->description,
                    'tanggal_mulai' => $kegiatan->tanggal_mulai,
                    'tanggal_selesai' => $kegiatan->tanggal_selesai,
                ]
            );
            $model->save();
        }
	}
}

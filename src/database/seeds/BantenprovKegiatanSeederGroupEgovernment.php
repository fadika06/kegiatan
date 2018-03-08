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
            ],
            (object) [
                'label' => 'Kegiatan 2',
                'description' => 'Kegiatan 2',
            ]
        ];

        foreach ($kegiatans as $kegiatan) {
            $model = Kegiatan::updateOrCreate(
                [
                    'label' => $kegiatan->label,
                ],
                [
                    'description' => $kegiatan->description,
                ]
            );
            $model->save();
        }
	}
}

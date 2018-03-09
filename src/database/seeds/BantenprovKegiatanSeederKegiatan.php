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
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
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

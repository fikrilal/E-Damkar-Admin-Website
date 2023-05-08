<?php

namespace Database\Factories;

use App\Models\laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\laporan>
 */
class laporanFactory extends Factory
{
    protected $model = laporan::class;

    public function definition(): array
    {
        return [
            "user_listdata_id" => rand(1, 10),
            "status_riwayat_id" =>  1,
            "kategori_laporan_id" => 1,
            "tgl_lap" => "2023-05-16",
            "deskripsi_laporan" => fake()->paragraph(),
            "gambar_bukti_pelaporan" => "gambar",
<<<<<<< HEAD
            "alamat_kejadian" => "nganjuk", 
            "bukti_penanganan" => "gambar.jpg"
=======
            "alamat_kejadian" => "nganjuk",
            "latitude" => "-7.2232139",
            "longitude" => "112.6226935"
>>>>>>> 26648d8124115584cc5db0fed7bfb8f54fc5fec6
        ];
    }
}
// -7.2232139, 112.6226935
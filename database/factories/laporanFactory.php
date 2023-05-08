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
            "alamat_kejadian" => "nganjuk"
        ];
    }
}

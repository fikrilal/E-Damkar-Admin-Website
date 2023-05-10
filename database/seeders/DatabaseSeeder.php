<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\admin_damkar;
use App\Models\artikel_berita;
use Illuminate\Database\Seeder;
use App\Models\user_listData;
use App\Models\StatusRiwayat;
use App\Models\KategoriLaporan;
use App\Models\laporan;
use App\Models\Kedudukan;
use Database\Factories\adminDamkarFactory;
use Database\Factories\artikelBeritaFactory;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        user_listData::create([
            'email' => "danakhdan12@gmail",
            'password' => Hash::make('superone'),
            'namaLengkap' => "Akhdan",
            'noHp' => "085756436576", 
            'kodeOtp' => '87657554', 
            'status' => 'aktif',
            'foto_user' => ''
        ]);


        user_listData::factory(10)->create();
        laporan::factory(10)->create();
        admin_damkar::factory(10)->create();
        artikel_berita::factory(30)->create();


        StatusRiwayat::create([
            'nama_status' => 'Mengunggu'
        ]);

        StatusRiwayat::create([
            'nama_status' => 'Ditangani'
        ]);

        StatusRiwayat::create([
            'nama_status' => 'Selesai'
        ]);

        StatusRiwayat::create([
            'nama_status' => 'Ditolak'
        ]);

        KategoriLaporan::create([
            'nama_kategori' => 'Kebakaran'
        ]);

        KategoriLaporan::create([
            'nama_kategori' => 'Bencara Alam'
        ]);

        KategoriLaporan::create([
            'nama_kategori' => 'Banjir'
        ]);

        Kedudukan::create([
            'nama_kedudukan' => 'superone'
        ]);

        Kedudukan::create([
            'nama_kedudukan' => 'admin'
        ]);

        // laporan::create([
        //     'user_listdata_id' => 1,
        //     'status_riwayat_id' => 1,
        //     'kategori_laporan_id' => 1,
        //     'tgl_lap' => '2023-04-14',
        //     'deskripsi_laporan' => 'required',
        //     'gambar_bukti_pelaporan' => 'image',
        //     'alamat_kejadian' => 'required'
        // ]);
    }
}

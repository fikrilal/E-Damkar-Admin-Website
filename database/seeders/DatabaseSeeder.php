<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\admin_damkar;
use App\Models\artikel_agenda;
use App\Models\artikel_berita;
use App\Models\artikel_edukasi;
use App\Models\detail_korban;
use App\Models\detail_laporan_pengguna;
use App\Models\detail_laporan_petugas;
use Illuminate\Database\Seeder;
use App\Models\user_listData;
use App\Models\StatusRiwayat;
use App\Models\KategoriLaporan;
use App\Models\laporan;
use App\Models\Kedudukan;
use App\Models\kondisi_cuaca;
use App\Models\Pengaturan;
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



        admin_damkar::create([
            'email' => "superadmin@gmail.com",
            'password' => Hash::make('superone'),
            'nama_lengkap' => "SuperAdmin",
            'noHp' => "085756436576",
            'kedudukans_id' => "1"
        ]);

        user_listData::create([
            'username' => "Anonym",
            'password' => Hash::make('superone'),
            'namaLengkap' => "Akhdan",
            'noHp' => "080921039",
            'kodeOtp' => '87657554',
            'status' => 'Verified',
            'foto_user' => ''
        ]);

        // user_listData::factory(10)->create();
        // laporan::factory(10)->create();
        // admin_damkar::factory(10)->create();
        artikel_berita::factory(10)->create();
        artikel_edukasi::factory(10)->create();
        artikel_agenda::factory(10)->create();

        kondisi_cuaca::create([
            "nama_kondisi_cuaca" => 'Cerah'
        ]);
        kondisi_cuaca::create([
            "nama_kondisi_cuaca" => 'Berkabut'
        ]);
        kondisi_cuaca::create([
            "nama_kondisi_cuaca" => 'Mendung'
        ]);
        kondisi_cuaca::create([
            "nama_kondisi_cuaca" => 'Hujan'
        ]);

        StatusRiwayat::create([
            'nama_status' => 'Menunggu'
        ]);
        StatusRiwayat::create([
            'nama_status' => 'Proses'
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
            'nama_kategori' => 'Bencana Alam'
        ]);

        KategoriLaporan::create([
            'nama_kategori' => 'Penyelamatan'
        ]);
        KategoriLaporan::create([
            'nama_kategori' => 'Hewan Buas'
        ]);
        KategoriLaporan::create([
            'nama_kategori' => 'custom'
        ]);

        Kedudukan::create([
            'nama_kedudukan' => 'superadmin'
        ]);

        Kedudukan::create([
            'nama_kedudukan' => 'admin'
        ]);

        Pengaturan::create([
            'jumlah_mobil' => '0',
            'jumlah_personil' => '0',
            'jumlah_kantor' => '0'
        ]);
    }
}

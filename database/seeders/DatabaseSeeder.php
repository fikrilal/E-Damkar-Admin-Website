<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\admin_damkar;
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

        // // user_listData::create([
        // //     'username' => "danakhdan12@gmail.com",
        // //     'password' => Hash::make('superone'),
        // //     'namaLengkap' => "Akhdan",
        // //     'noHp' => "085756436576",
        // //     'kodeOtp' => '87657554',
        // //     'status' => 'aktif',
        // //     'foto_user' => ''
        // // ]);

        user_listData::factory(10)->create();
        // laporan::factory(10)->create();
        // admin_damkar::factory(10)->create();
        // artikel_berita::factory(30)->create();
        // artikel_edukasi::factory(30)->create();

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
            'nama_kategori' => 'Bencara Alam'
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


//         detail_laporan_pengguna::create([
//             'user_listdata_id' => 1,
//             'deskripsi_laporan' => 'lorme ipsum',
//             'waktu_pelaporan' => '12:00',
//             'tgl_pelaporan' => now(),
//             'urgensi' => 'kebakaran',
//             'alamat' => 'jl ksdjflkd',
//             'latitude' => 12.7,
//             'longitude' => 11.2,
//             'bukti_foto_laporan_pengguna' => 'image'
//         ]);


//         detail_laporan_petugas::create([
//             'damkar_id' => 1,
//             'waktu_penanganan' => '12:00',
//             'tgl_laporan_petugas' => '08-05-2023',
//             'deskripsi_petugas' => 'lorem ipsum petugas',
//             'korban_jiwa' => 0,
//             'waktu_berangkat' => '12:00',
// 'waktu_sampai' => '12:00',
// 'waktu_selesai' => '12:00',
//             'korban_luka_ringan' => 0,
//             'korban_luka_berat' => 0,
//             'kerugian' => '000000',
//             'luas_lahan' => '234',
//             'tindakan' => 'Melakukan Pemadaman',
//             'pihak_yang_datang' => 'Babinsa',
//             'jenis_evakuasi' => 'Evakuasi Sarang Tawon',
//             'team_evakuasi' => 'Fajar Nughroho, Thio Agustin',
//             'bukti_foto_laporan_petugas' => 'gambar'
//         ]);

//         detail_korban::create([
//             'nama_lengkap' => 'super one',
//             'NIK' => '1293802083',
//             'umur' => '12'
//         ]);


//         laporan::create([
//             'status_riwayat_id' => 1,
//             'kategori_laporan_id' => 1,
//             'detail_korban_id' => 1,
//             'kondisi_cuaca_id' => 1,
//             'detail_laporan_pengguna_id' => 1,
//             'detail_laporan_petugas_id' => 1
//         ]);

//         //laporan menunggu
//         detail_laporan_pengguna::create([
//             'user_listdata_id' => 1,
//             'deskripsi_laporan' => 'lorme ipsum',
//             'waktu_pelaporan' => '12:00',
//             'tgl_pelaporan' => now(),
//             'urgensi' => 'kebakaran',
//             'alamat' => 'jl ksdjflkd',
//             'latitude' => 12.7,
//             'longitude' => 11.2,
//             'bukti_foto_laporan_pengguna' => 'image'
//         ]);


//         detail_laporan_petugas::create([
//             'damkar_id' => 1,
//             'waktu_penanganan' => '12:00',
//             'tgl_laporan_petugas' => '08-05-2023',
//             'deskripsi_petugas' => 'lorem ipsum petugas',
//             'korban_jiwa' => 0,
//             'korban_luka_ringan' => 0,
//             'korban_luka_berat' => 0,
//             'waktu_berangkat' => '12:00',
// 'waktu_sampai' => '12:00',
// 'waktu_selesai' => '12:00',
//             'kerugian' => '000000',
//             'luas_lahan' => '234',
//             'tindakan' => 'Melakukan Pemadaman',
//             'pihak_yang_datang' => 'Babinsa',
//             'jenis_evakuasi' => 'Evakuasi Sarang Tawon',
//             'team_evakuasi' => 'Fajar Nughroho, Thio Agustin',
//             'bukti_foto_laporan_petugas' => 'gambar'
//         ]);

        // detail_korban::create([
        //     'nama_lengkap' => 'super one',
        //     'NIK' => '1293802083',
        //     'umur' => '12'
        // ]);


        // laporan::create([
        //     'status_riwayat_id' => 2,
        //     'kategori_laporan_id' => 1,
        //     'detail_korban_id' => 1,
        //     'kondisi_cuaca_id' => 1,
        //     'detail_laporan_pengguna_id' => 2,
        //     'detail_laporan_petugas_id' => 2
        // ]);

        // //laporan proses
        // detail_laporan_pengguna::create([
        //     'user_listdata_id' => 1,
        //     'deskripsi_laporan' => 'lorme ipsum',
        //     'waktu_pelaporan' => '12:00',
        //     'tgl_pelaporan' => now(),
        //     'urgensi' => 'kebakaran',
        //     'alamat' => 'jl ksdjflkd',
        //     'latitude' => 12.7,
        //     'longitude' => 11.2,
        //     'bukti_foto_laporan_pengguna' => 'image'
        // ]);


        // detail_laporan_petugas::create([
        //     'damkar_id' => 1,
        //     'waktu_penanganan' => '12:00',
        //     'tgl_laporan_petugas' => '08-05-2023',
        //     'deskripsi_petugas' => 'lorem ipsum petugas',
        //     'korban_jiwa' => 0,
        //     'korban_luka_ringan' => 0,
        //     'korban_luka_berat' => 0,
        //     'kerugian' => '000000',
        //     'luas_lahan' => '234',
        //     'tindakan' => 'Melakukan Pemadaman',
        //     'pihak_yang_datang' => 'Babinsa',
        //     'jenis_evakuasi' => 'Evakuasi Sarang Tawon',
        //     'team_evakuasi' => 'Fajar Nughroho, Thio Agustin',
        //     'bukti_foto_laporan_petugas' => 'gambar'
        // ]);

        // detail_korban::create([
        //     'nama_lengkap' => 'super one',
        //     'NIK' => '1293802083',
        //     'umur' => '12'
        // ]);


        // laporan::create([
        //     'status_riwayat_id' => 3,
        //     'kategori_laporan_id' => 1,
        //     'detail_korban_id' => 1,
        //     'kondisi_cuaca_id' => 1,
        //     'detail_laporan_pengguna_id' => 3,
        //     'detail_laporan_petugas_id' => 3
        // ]);

        // //laporan selesai
        // detail_laporan_pengguna::create([
        //     'user_listdata_id' => 1,
        //     'deskripsi_laporan' => 'lorme ipsum',
        //     'waktu_pelaporan' => '12:00',
        //     'tgl_pelaporan' => now(),
        //     'urgensi' => 'kebakaran',
        //     'alamat' => 'jl ksdjflkd',
        //     'latitude' => 12.7,
        //     'longitude' => 11.2,
        //     'bukti_foto_laporan_pengguna' => 'image'
        // ]);


        // detail_laporan_petugas::create([
        //     'damkar_id' => 1,
        //     'waktu_penanganan' => '12:00',
        //     'tgl_laporan_petugas' => '08-05-2023',
        //     'deskripsi_petugas' => 'lorem ipsum petugas',
        //     'korban_jiwa' => 0,
        //     'korban_luka_ringan' => 0,
        //     'korban_luka_berat' => 0,
        //     'kerugian' => '000000',
        //     'luas_lahan' => '234',
        //     'tindakan' => 'Melakukan Pemadaman',
        //     'pihak_yang_datang' => 'Babinsa',
        //     'jenis_evakuasi' => 'Evakuasi Sarang Tawon',
        //     'team_evakuasi' => 'Fajar Nughroho, Thio Agustin',
        //     'bukti_foto_laporan_petugas' => 'gambar'
        // ]);

        // detail_korban::create([
        //     'nama_lengkap' => 'super one',
        //     'NIK' => '1293802083',
        //     'umur' => '12'
        // ]);


        // laporan::create([
        //     'status_riwayat_id' => 4,
        //     'kategori_laporan_id' => 1,
        //     'detail_korban_id' => 1,
        //     'kondisi_cuaca_id' => 1,
        //     'detail_laporan_pengguna_id' => 4,
        //     'detail_laporan_petugas_id' => 4
        // ]);
    }
}

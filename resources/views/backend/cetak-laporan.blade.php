<script>
        // Function to automatically trigger print when the page loads
        window.onload = function () {
            window.print();
        };

        // Function to handle Ctrl + P key press and trigger print
        document.addEventListener('keydown', function (e) {
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault(); // Prevent default Ctrl + P behavior (print dialog)
                window.print(); // Trigger print
            }
        });
    </script>

<!DOCTYPE html>
<html>
<head>
  <title>{{ $title ?? config('app.name') }}</title>
  <style>
    body {
      margin-top: 4cm;
      margin-left: 4cm;
      margin-bottom: 3cm;
      margin-right: 3cm;
      font-family: Arial, sans-serif;
    }
    h2 {
      text-align: center;
    }
    h3{
        text-align: center;
    }
    .section {
      margin-top: 1.5cm;
      margin-bottom: 1.5cm;
    }
    .section-title {
      /* font-weight: bold; */
    }
    .section-content {
      margin-top: 0.5cm;
    }
    .data {
      margin-top: 0.5cm;
      margin-bottom: 0.5cm;
    }
    .data-label {
      /* font-weight: bold; */
    }
  </style>
</head>
<body>
  <h2>DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN KABUPATEN NGANJUK</h2>
  
  
  <?php
if ($laporan->kategori_laporan_id == 1) {
  echo '<h3>MELAPORKAN GIAT PEMADAMAN API</h3>';
} else if ($laporan->kategori_laporan_id == 2) {
  echo '<h3>MELAPORKAN GIAT BENCANA ALAM</h3>';
} else if ($laporan->kategori_laporan_id == 3) {
  echo '<h3>MELAPORKAN GIAT PENYELAMATAN</h3>';
} else if ($laporan->kategori_laporan_id == 4) {
  echo '<p><h3>MELAPORKAN GIAT EVAKUASI HEWAN BUAS</h3>';
} else if ($laporan->kategori_laporan_id == 5) {
  echo '<h3>MELAPORKAN GIAT EVAKUASI</h3>';
} else {
  echo '<p>Kategori laporan tidak valid</p>';
}


  ?>

  <p>Selamat <?php
if (isset($laporan) && isset($laporan->detailLaporanPetugas->waktu_penanganan)) {
    $waktu_penanganan = $laporan->detailLaporanPetugas->waktu_penanganan;

    // Ubah format waktu_penanganan ke dalam format waktu (misalnya 24 jam)
    $jam = intval(substr($waktu_penanganan, 0, 2));

    // Tentukan kategori waktu berdasarkan jam
    if ($jam >= 0 && $jam < 6) {
        echo "malam";
    } elseif ($jam >= 6 && $jam < 12) {
        echo "pagi";
    } elseif ($jam >= 12 && $jam < 15) {
        echo "siang";
    } elseif ($jam >= 15 && $jam < 18) {
        echo "sore";
    } else {
        echo "malam";
    }
} else {
    echo "Waktu penanganan tidak tersedia.";
}
?>
 Bapak Bupati Dan Bapak Kepala Dinas Dinas Pemadam Kebakaran dan Penyelamatan Kab.Nganjuk</p>
  <?php

if ($laporan->kategori_laporan_id == 1) {
  echo '<p>Izin melaporkan giat pemadaman kebakaran</p>';
} else if ($laporan->kategori_laporan_id == 2) {
  echo '<p>Izin melaporkan giat evakuasi bencana alam</p>';
} else if ($laporan->kategori_laporan_id == 3) {
  echo '<p>Izin melaporkan giat penyelamatan</p>';
} else if ($laporan->kategori_laporan_id == 4) {
  echo '<p>Izin melaporkan giat evakuasi hewan buas</p>';
} else if ($laporan->kategori_laporan_id == 5) {
  echo '<p>Izin melaporkan giat pertolongan medis darurat</p>';
} else {
  echo '<p>Kategori laporan tidak valid</p>';
}

  ?>

<?php
if ($laporan->kategori_laporan_id == 1 || $laporan->kategori_laporan_id == 2 || $laporan->kategori_laporan_id == 3 || $laporan->kategori_laporan_id == 5) {
?>

  <div class="section">
    <div class="section-title"><b>&#9632; WAKTU  KEJADIAN</b></div>
    <div class="section-content">
      <?php
      function translateDayToIndonesian($englishDay)
      {
          $days = array(
              'Sunday' => 'Minggu',
              'Monday' => 'Senin',
              'Tuesday' => 'Selasa',
              'Wednesday' => 'Rabu',
              'Thursday' => 'Kamis',
              'Friday' => 'Jumat',
              'Saturday' => 'Sabtu',
          );

          return isset($days[$englishDay]) ? $days[$englishDay] : '';
      }

      // Gunakan fungsi translateDayToIndonesian() untuk mengubah nama hari
      $englishDay = isset($laporan) ? date('l', strtotime($laporan->detailLaporanPengguna->tgl_pelaporan)) : '';
      $indonesianDay = translateDayToIndonesian($englishDay);
      ?>

      <div class="data">
        <div class="data-label">Hari : <?= $indonesianDay ?></div>
        <div class="data-value"></div>
      </div>
      <div class="data">
        <div class="data-label">Tanggal : <?php
                                          // Tanggal dari variabel $laporan->detailLaporanPengguna->tgl_pelaporan
                                          $originalDate = isset($laporan) ? $laporan->detailLaporanPengguna->tgl_pelaporan : '';

                                          // Ubah format tanggal menjadi "01-02-2023"
                                          $formattedDate = date('d-m-Y', strtotime($originalDate));

                                          // Output hasilnya
                                          echo $formattedDate;
                                          ?>
        </div>
        <div class="data-value"></div>
      </div>
      <div class="data">
        <div class="data-label">Respon Time : <?= isset($laporan) ? $laporan->detailLaporanPetugas->waktu_penanganan : '' ?> WIB</div>
        <div class="data-value"></div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="section-title"><b>&#9632; SUMBER INFORMASI : Aplikasi E-DAMKAR</b></div>
    <div class="data-value"></div>
  </div>


    <div class="section">
  <div class="section-title"><b>&#9632; DATA PELAPOR</b></div>
  <div class="section-content">
    <div class="data">
      <div class="data-label">Nama : <?= isset($laporan) ? $laporan->detailLaporanPengguna->user_listdata->namaLengkap : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label">No.HP : <?= isset($laporan) ? $laporan->detailLaporanPengguna->user_listdata->noHp : '' ?></div>
      <div class="data-value"></div>
    </div>

    <div class="data">
      <div class="data-label">Alamat : <?= isset($laporan) ? $laporan->detailLaporanPengguna->alamat : '' ?></div>
      <div class="data-value"></div>
    </div>
  </div>


  <?php
  if ($laporan->kategori_laporan_id == 1) {
  ?>
  <div class="section">
<div class="data">
      <div class="data-label"><b>&#9632; PENYEBAB KEBAKARAN</b> : <?= isset($laporan) ? $laporan->detailLaporanPetugas->deskripsi_petugas : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; LUAS LAHAN</b> : &#177; <?= isset($laporan) ? $laporan->detailLaporanPetugas->luas_lahan : '' ?> 	
&#13217;</div>
      <div class="data-value"></div>
    </div>
  </div>
</div>

  <?php
  } else if ($laporan->kategori_laporan_id == 2 || $laporan->kategori_laporan_id == 3) {
  ?>
    <div class="section">
      <div class="section-title"><b>&#9632; KRONOLOGI KEJADIAN</b> : <?= isset($laporan) ? $laporan->detailLaporanPetugas->deskripsi_petugas : '' ?></div>
      <div class="data-value"></div>
    </div>
  <?php
  } else {
    echo '<p>Kategori laporan tidak dikenali</p>';
  }
  ?>

  <div class="section">
    <div class="section-title"><b>&#9632; KORBAN</b></div>
    <div class="section-content">
      <div class="data">
        <div class="data-label">1. Korban Jiwa : <?= isset($laporan) ? ($laporan->detailLaporanPetugas->korban_jiwa !== 0 ? $laporan->detailLaporanPetugas->korban_jiwa : '-') : '' ?></div>
        <div class="data-value"></div>
      </div>
      <div class="data">
        <div class="data-label">2. Korban Luka Ringan : <?= isset($laporan) ? ($laporan->detailLaporanPetugas->korban_luka_berat !== 0 ? $laporan->detailLaporanPetugas->korban_luka_berat : '-') : '' ?></div>
        <div class="data-value"></div>
      </div>
      <div class="data">
        <div class="data-label">3. Korban Luka Berat : <?= isset($laporan) ? ($laporan->detailLaporanPetugas->korban_luka_ringan !== 0 ? $laporan->detailLaporanPetugas->korban_luka_ringan : '-') : '' ?></div>
        <div class="data-value"></div>
      </div>
    </div>
  </div>

  <div class="section-content">
<div class="data">
      <div class="data-label"><b>&#9632; KERUGIAN MATERIAL</b> : &#177; Rp. <?= isset($laporan) ? number_format($laporan->detailLaporanPetugas->kerugian, 0, ',', '.') : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; KONDISI CUACA</b> : <?= isset($laporan) ? $laporan->kondisiCuaca->nama_kondisi_cuaca : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; TINDAKAN</b> : <?= isset($laporan) ? $laporan->detailLaporanPetugas->tindakan : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; PIHAK / UNSUR YANG DATANG KE LOKASI, Antara Lain</b> :  <?= isset($laporan) ? $laporan->detailLaporanPetugas->pihak_yang_datang : '' ?></div>
      <div class="data-value"></div>
    </div>
  </div>
</div>

  <div class="section">
    <div class="section-title"><b>&#9632;  DOKUMENTASI</b> : </div>
    <img src="{{ asset('storage/bukti_penanganan/'.$laporan->detailLaporanPetugas->bukti_foto_laporan_petugas . '.jpg') }}" width="60%">
    <div class="data-value"></div>
  </div>

<?php
} else if ($laporan->kategori_laporan_id == 4) {
  ?>
  <div class="section">
  <div class="section-title"><b>&#9632; DATA PELAPOR</b></div>
  <div class="section-content">
    <div class="data">
      <div class="data-label">Nama : <?= isset($laporan) ? $laporan->detailLaporanPengguna->user_listdata->namaLengkap : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label">No.HP : <?= isset($laporan) ? $laporan->detailLaporanPengguna->user_listdata->noHp : '' ?></div>
      <div class="data-value"></div>
    </div>

    <div class="data">
      <div class="data-label">Alamat : <?= isset($laporan) ? $laporan->detailLaporanPengguna->alamat : '' ?></div>
      <div class="data-value"></div>
    </div>
  </div>
</div>

<div class="section">
  <div class="section-title"><b>&#9632; GIAT DILAKSANAKAN</b></div>
  <div class="section-content">

  <?php
      function translateDayToIndonesian($englishDay)
      {
          $days = array(
              'Sunday' => 'Minggu',
              'Monday' => 'Senin',
              'Tuesday' => 'Selasa',
              'Wednesday' => 'Rabu',
              'Thursday' => 'Kamis',
              'Friday' => 'Jumat',
              'Saturday' => 'Sabtu',
          );

          return isset($days[$englishDay]) ? $days[$englishDay] : '';
      }

      // Gunakan fungsi translateDayToIndonesian() untuk mengubah nama hari
      $englishDay = isset($laporan) ? date('l', strtotime($laporan->detailLaporanPetugas->tgl_laporan_petugas)) : '';
      $indonesianDay1 = translateDayToIndonesian($englishDay);
      ?>

    <div class="data">
      <div class="data-label">Hari : <?= $indonesianDay1 ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label">Tanggal : <?php
                                          // Tanggal dari variabel $laporan->detailLaporanPengguna->tgl_pelaporan
                                          $originalDate = isset($laporan) ? $laporan->detailLaporanPetugas->tgl_laporan_petugas : '';

                                          // Ubah format tanggal menjadi "01-02-2023"
                                          $formattedDate = date('d-m-Y', strtotime($originalDate));

                                          // Output hasilnya
                                          echo $formattedDate;
                                          ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label">Jam : <?= isset($laporan) ? $laporan->detailLaporanPetugas->waktu_penanganan : '' ?> WIB</div>
      <div class="data-value"></div>
    </div>
  </div>
</div>


<div class="section-content">
<div class="data">
      <div class="data-label"><b>&#9632; OBYEK</b> : <?= isset($laporan) ? $laporan->detailLaporanPengguna->nama_hewan : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; JENIS EVAKUASI</b> : <?= isset($laporan) ? $laporan->detailLaporanPetugas->jenis_evakuasi : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; PENDUKUNG</b> :  <?= isset($laporan) ? $laporan->detailLaporanPetugas->pihak_yang_datang : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; TEAM EVAKUASI</b> : <?= isset($laporan) ? $laporan->detailLaporanPetugas->team_evakuasi : '' ?></div>
      <div class="data-value"></div>
    </div>
    <div class="data">
      <div class="data-label"><b>&#9632; DOKUMENTASI</b>:</div>
  <img src="{{ asset('storage/bukti_penanganan/'.$laporan->detailLaporanPetugas->bukti_foto_laporan_petugas . '.jpg') }}" width="60%">
  <div class="data-value"></div>
    </div>
  </div>
</div>

<div class="section">
  <div


  <?php
}
?>

  <p>Demikian laporan giat pada <?php
if (isset($laporan) && isset($laporan->detailLaporanPetugas->waktu_penanganan)) {
    $waktu_penanganan = $laporan->detailLaporanPetugas->waktu_penanganan;

    // Ubah format waktu_penanganan ke dalam format waktu (misalnya 24 jam)
    $jam = intval(substr($waktu_penanganan, 0, 2));

    // Tentukan kategori waktu berdasarkan jam
    if ($jam >= 0 && $jam < 6) {
        echo "malam";
    } elseif ($jam >= 6 && $jam < 12) {
        echo "pagi";
    } elseif ($jam >= 12 && $jam < 15) {
        echo "siang";
    } elseif ($jam >= 15 && $jam < 18) {
        echo "sore";
    } else {
        echo "malam";
    }
} else {
    echo "Waktu penanganan tidak tersedia.";
}
?>
 hari ini. Terima kasih</p>
</body>
</html>

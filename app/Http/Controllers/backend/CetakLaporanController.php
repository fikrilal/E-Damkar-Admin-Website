<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\laporan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use PDF;
use Barryvdh\Snappy\Facades\SnappyPdf;

class CetakLaporanController extends Controller
{
    public function index()
    {
        return view('backend.laporan');
    }


    public function show(Request $request)
    {

        $tanggal = Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY'); // Format tanggal dalam bahasa Indonesia

        $idLaporan = $request->query('idLaporan');

        $title = "Cetak Laporan ID#{$idLaporan} | E-Damkar Nganjuk";


        // Use Eloquent to retrieve the laporan object with related user_listdata
        $laporan = Laporan::where('idLaporan', $idLaporan)->first();

        if (!$laporan) {
            // Jika laporan dengan $idLaporan tidak ditemukan, berikan respons sesuai kebutuhan
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }

        // Kemudian, kembalikan view yang menampilkan data laporan
        return view('backend.cetak-laporan', compact('laporan', 'tanggal', 'title'));
    }


        public function cetakPDF(Request $request)
    {
        $idLaporan = $request->query('idLaporan');

        // Use Eloquent to retrieve the laporan object with related user_listdata
        $laporan = Laporan::where('idLaporan', $idLaporan)->first();

        if (!$laporan) {
            // Jika laporan dengan $idLaporan tidak ditemukan, berikan respons sesuai kebutuhan
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }

        $tanggal = Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY'); // Format tanggal dalam bahasa Indonesia
        $title = 'Download Laporan Kebakaran | E-Damkar Nganjuk';

        // Generate PDF using the view "backend.cetak-laporan"
        $pdf = PDF::loadView('backend.cetak-laporan', compact('laporan', 'tanggal', 'title'));

        // Optional: You can set PDF options here if needed
        // For example: $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        // Return the PDF as a downloadable response
        // By default, the PDF will be displayed in the browser if you don't want to force download
        return $pdf->download('laporan_kebakaran.pdf');
    }

}

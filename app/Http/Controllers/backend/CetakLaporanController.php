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
    $tanggal = Carbon::now()->locale('id')->isoFormat('DD MMMM YYYY'); // Format tanggal dalam bahasa Indonesia

    $idLaporan = $request->query('idLaporan');

    $title = "Cetak Laporan ID#{$idLaporan} | E-Damkar Nganjuk";

    // Use Eloquent to retrieve the laporan object with related user_listdata
    $laporan = Laporan::where('idLaporan', $idLaporan)->first();

    if (!$laporan) {
        // Jika laporan dengan $idLaporan tidak ditemukan, berikan respons sesuai kebutuhan
        return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
    }

    // Render the view to generate PDF content
    $pdf = PDF::loadView('backend.cetak-laporan', compact('laporan', 'tanggal', 'title'));

    // Generate a unique filename for the PDF
    $filename = "laporan-{$idLaporan}-{$tanggal}.pdf";

    $pdf->save(public_path($filename));


    // Return the PDF as a download response
    return $pdf->download($filename);
}

}

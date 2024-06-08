<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use App\Models\TransaksiPenyedia;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiPenyediaController extends Controller
{
    public function index()
    {
        $transaksipenyedias = TransaksiPenyedia::with('penyedia')->get();
        return view('transaksi-penyedia.transaksi-penyedia', compact('transaksipenyedias'));
    }
    
    public function cetakPdf()
    {
        $transaksipenyedias = TransaksiPenyedia::with('penyedia')->get();
        $pdf = Pdf::loadView('transaksi-penyedia.transaksi-penyedia-cetak', compact('transaksipenyedias'));
        return $pdf->download('transaksi_penyedia.pdf');
    }
}

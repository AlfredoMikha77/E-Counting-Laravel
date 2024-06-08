<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $photo = $request->file('photo');
        $nama_photo = time() . '_' . $photo->getClientOriginalName();
        $tujuan_upload = 'img_layanan';
        $photo->move($tujuan_upload, $nama_photo);

        Layanan::create([
            'layanan' => $request->layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'photo' => $nama_photo,
        ]);

        return redirect('/layanan')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $layanan = Layanan::find($id);
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'layanan' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $layanan = Layanan::find($id);

        if ($request->hasFile('photo')) {
            File::delete('img_layanan/' . $layanan->photo);
            $photo = $request->file('photo');
            $nama_photo = time() . '_' . $photo->getClientOriginalName();
            $tujuan_upload = 'img_layanan';
            $photo->move($tujuan_upload, $nama_photo);
            $layanan->photo = $nama_photo;
        }

        $layanan->update([
            'layanan' => $request->layanan,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/layanan')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::find($id);
        File::delete('img_layanan/' . $layanan->photo);
        $layanan->delete();
        return redirect('/layanan')->with('success', 'Layanan berhasil dihapus.');
    }

    public function cetakPdf()
    {
        $layanans = Layanan::all();
        $pdf = PDF::loadView('layanan.cetak', compact('layanans'));
        return $pdf->download('layanan.pdf');
    }
}

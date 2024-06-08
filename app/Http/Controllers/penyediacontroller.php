<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use App\Models\TransaksiPenyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenyediaController extends Controller
{
    public function index()
    {
        $penyedias = Penyedia::all();
        return view('penyedia.penyedia', compact('penyedias'));
    }

    public function create()
    {
        return view('penyedia.penyedia-entry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $photo = $request->file('photo');
        $nama_photo = time() . '_' . $photo->getClientOriginalName();
        $tujuan_upload = 'img_penyedia';
        $photo->move($tujuan_upload, $nama_photo);

        $penyedia = Penyedia::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'photo' => $nama_photo,
        ]);

        // Menyimpan data ke tabel transaksi_penyedias
        TransaksiPenyedia::create([
            'penyedia_id' => $penyedia->id_penyedia,
        ]);

        return redirect('/penyedia');
    }

    public function edit($id_penyedia)
    {
        $penyedia = Penyedia::find($id_penyedia);
        return view('penyedia.penyedia-edit', compact('penyedia'));
    }

    public function update(Request $request, $id_penyedia)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $penyedia = Penyedia::find($id_penyedia);

        if($request->hasFile('photo')){
            File::delete('img_penyedia/'.$penyedia->photo);
            $photo = $request->file('photo');
            $nama_photo = time() . '_' . $photo->getClientOriginalName();
            $tujuan_upload = 'img_penyedia';
            $photo->move($tujuan_upload, $nama_photo);
            $penyedia->photo = $nama_photo;
        }

        $penyedia->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/penyedia');
    }

    public function delete($id_penyedia)
    {
        $penyedia = Penyedia::find($id_penyedia);
        return view('penyedia.penyedia-hapus', compact('penyedia'));
    }

    public function destroy($id_penyedia)
    {
        $penyedia = Penyedia::find($id_penyedia);
        File::delete('img_penyedia/'.$penyedia->photo);
        $penyedia->delete();
        return redirect('/penyedia');
    }
}

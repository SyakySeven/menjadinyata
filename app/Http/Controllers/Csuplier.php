<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Msuplier;

class Csuplier extends Controller
{
    public function index()
    {
        $suplier = Msuplier::get();
        return view('suplier.index', compact('suplier'));
    }

    public function create()
    {
        $kode_suplier = $this->kode_suplier();
        return view('suplier.create', compact('kode_suplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_suplier'    => 'required|max:15|unique:suplier,id_suplier',
        ]);

        Msuplier::create([
            'id_suplier'    => $request->id_suplier,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
            'kode_pos'      => $request->kode_pos,
            'kota'          => $request->kota,
        ]);

        return redirect()->route('suplier.index')->with('status',['judul' => 'Sukses', 'pesan' => 'Data tersimpan', 'icon' => 'success']);
    }

    public function edit($id_suplier)
    {
        $sup = Msuplier::where('id_suplier', $id_suplier)->first();
        return view('suplier.edit', compact('sup'));
    }

    public function update(Request $request, $id_suplier)
    {
        $suplier = Msuplier::where('id_suplier', $id_suplier)->first();

        $suplier->nama      = $request->nama;
        $suplier->alamat    = $request->alamat;
        $suplier->kode_pos  = $request->kode_pos;
        $suplier->kota      = $request->kota;
        $suplier->save();

        return redirect()->route('suplier.index')->with(['success' => 'Data tersimpan']);
    }

    public function destroy($id_suplier)
    {
        $suplier = Msuplier::where('id_suplier', $id_suplier)->first();
        $suplier->delete();
        return redirect()->route('suplier.index')->with('Sukses', 'Data terhapus');
    }

    private function kode_suplier() 
    {
        $tahun = date('y');
        $bulan = date('m');
        $tahun_bulan = $tahun . $bulan;

        $nomor_terakhir = Msuplier::where('id_suplier', 'like', 'S-' . $tahun_bulan . '%')
            ->orderBy('id_suplier', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'S-' . $tahun_bulan . '0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_suplier, 7);
            $newKodeNumber = $lastKode + 1;
            $newKode = 'S-' . $tahun_bulan . str_pad($newKodeNumber, 4, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }

    public function cetak()
    {
        $suplier = Msuplier::get();
        return view('suplier.cetak', compact('suplier'));
    }

    public function excel()
    {
        $suplier = Msuplier::get();
        return response()->view('suplier.excel', compact('suplier'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=Suplier.xls');
    }
}

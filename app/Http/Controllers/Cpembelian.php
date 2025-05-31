<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use App\Models\Mpembeli;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mpembelian;
use App\Models\Msuplier;

class Cpembelian extends Controller
{
    public function index()
    {
        $data = Mpembelian::with(['barang', 'suplier'])->get();
        
        return view('pembelian.index', compact('data'));
    }
    public function create()
    {
        $kode_pembelian = $this->kode_pembelian();
        $suplier = Msuplier::all();
        $barang = Mbarang::all();
        
        return view('pembelian.create', compact('barang', 'suplier', 'kode_pembelian'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_pembelian'    => 'required|max:15|unique:pembelian,id_pembelian',
            'qty'           => 'required|numeric|min:1',
        ]);

        Mpembelian::create($request->all());
        return redirect()->route('pembelian.index')->with('status',['judul' => 'Sukses', 'pesan' => 'Data tersimpan', 'icon' => 'success']);
    }
    public function edit($id)
    {
        $pembelian = Mpembelian::findOrFail($id);
        $suplier = Msuplier::all();
        $barang = Mbarang::all();
        return view('pembelian.edit', compact('pembelian', 'barang', 'suplier'));
    }
    public function update(Request $request, $id)
    {
        $pembelian = Mpembelian::findOrFail($id);
        $pembelian->update($request->all());
        

        return redirect()->route('pembelian.index')->with(['success' => 'Data tersimpan']);
    }
    public function destroy($id_pembelian)
    {
        $pembelian = Mpembelian::where('id_pembelian', $id_pembelian)->first();
        $pembelian->delete();
        return redirect()->route('pembelian.index')->with('Sukses', 'Data tersimpan');
    }

    private function kode_pembelian() 
    {
        $tahun = date('y');
        $bulan = date('m');
        $tahun_bulan = $tahun . $bulan;

        $nomor_terakhir = Mpembelian::where('id_pembelian', 'like', 'Pm-' . $tahun_bulan . '%')
            ->orderBy('id_pembelian', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'Pm-' . $tahun_bulan . '0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_pembelian, 7);
            $newKodeNumber = $lastKode + 1;
            $newKode = 'Pm-' . $tahun_bulan . str_pad($newKodeNumber, 4, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }

    public function cetak()
    {
        $pembelian = Mpembelian::get();
        return view('pembelian.cetak', compact('pembelian'));
    }

    public function excel()
    {
        $data = Mpembelian::with(['barang', 'suplier'])->get();
        return response()->view('pembelian.excel', compact('data'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=Pembelian.xls');
    }
}

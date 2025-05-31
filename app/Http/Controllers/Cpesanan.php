<?php

namespace App\Http\Controllers;

use App\Models\Mbarang;
use App\Models\Mpembeli;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mpesanan;


class Cpesanan extends Controller
{
    public function index(Request $request)
    {
        $query = Mpesanan::with(['barang', 'pembeli'])
            ->orderBy('tgl_pesan', 'DESC');

        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tgl_pesan', [$request->dari, $request->sampai]);
        }

        $pesanan = $query->get();
        return view('pesanan.index', compact('pesanan'));
    }
    public function create()
    {
        $kode_pesanan = $this->kode_pesanan();
        $barang = Mbarang::all();
        $pembeli = Mpembeli::all();
        
        return view('pesanan.create', compact('pembeli', 'barang', 'kode_pesanan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_pesanan'    => 'required|max:15|unique:pesanan,id_pesanan',
            'qty'           => 'required|numeric|min:1',
        ]);

        Mpesanan::create($request->all());
        return redirect()->route('pesanan.index')->with('status',['judul' => 'Sukses', 'pesan' => 'Data tersimpan', 'icon' => 'success']);
    }
    public function edit($id)
    {
        $pesanan = Mpesanan::findOrFail($id);
        $barang = Mbarang::all();
        $pembeli = Mpembeli::all();
        return view('pesanan.edit', compact('pesanan', 'pembeli', 'barang'));
    }
    public function update(Request $request, $id)
    {
        $pesanan = Mpesanan::findOrFail($id);
        $pesanan->update($request->all());
        

        return redirect()->route('pesanan.index')->with(['success' => 'Data tersimpan' ]);
    }
    public function destroy($id_pesanan)
    {
        $pesanan = Mpesanan::where('id_pesanan', $id_pesanan)->first();
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('Sukses', 'Data tersimpan');
    }

    private function kode_pesanan() 
    {
        $tahun = date('y');
        $bulan = date('m');
        $tahun_bulan = $tahun . $bulan;

        $nomor_terakhir = Mpesanan::where('id_pesanan', 'like', 'Ps-' . $tahun_bulan . '%')
            ->orderBy('id_pesanan', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'Ps-' . $tahun_bulan . '0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_pesanan, 7);
            $newKodeNumber = $lastKode + 1;
            $newKode = 'Ps-' . $tahun_bulan . str_pad($newKodeNumber, 4, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }

    public function cetak(Request $request)
    {
        $query = Mpesanan::with(['barang', 'pembeli'])->orderBy('tgl_pesan', 'DESC');
        if ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tgl_pesan', [$request->dari, $request->sampai]);
        }
        $pesanan = $query->get();
        return view('pesanan.cetak', compact('pesanan'));
    }

    public function excel()
    {
        $data = Mpesanan::with(['barang', 'pembeli'])->get();
        return response()->view('pesanan.excel', compact('data'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename=Pesanan.xls');
    }
}

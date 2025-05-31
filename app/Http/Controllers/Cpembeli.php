<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mpembeli;

class Cpembeli extends Controller
{
    public function index ()
    {
        $pembeli = Mpembeli::all();
        return view('pembeli.index', compact('pembeli'));
    }
    public function create ()
    {
        $kode_pembeli = $this->kode_pembeli();
        return view('pembeli.create',compact('kode_pembeli'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_pembeli'=> 'required|string|max:15|unique:pembeli,id_pembeli',
            'nama_pembeli'  => 'required|regex:/^[\pL\s]+$/u',
        ]);

        $pembeli = new Mpembeli();
        $pembeli->id_pembeli	= $request->id_pembeli;
        $pembeli->nama	= $request->nama_pembeli;
        $pembeli->jns_kelamin   	= $request->jk;
        $pembeli->alamat	= $request->alamat;
        $pembeli->kode_pos	= $request->kode_pos;
        $pembeli->tgl_lahir 	= $request->tgl_lahir;
        $pembeli->save();
        
        return redirect()->route('pembeli.index')->with('status',['judul' => 'Sukses', 'pesan' => 'Berhasil tersimpan', 'icon' => 'success']);
    }
    public function edit($id)
    {
        $pembeli = Mpembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembeli' => 'required|regex:/^[\pL\s]+$/u',
        ]);

        $pembeli = Mpembeli::findOrFail($id);

        $pembeli->nama = $request->nama_pembeli;
        $pembeli->jns_kelamin = $request->jk;
        $pembeli->alamat = $request->alamat;
        $pembeli->kode_pos = $request->kode_pos;
        $pembeli->tgl_lahir = $request->tgl_lahir;
        $pembeli->save();

        return redirect()->route('pembeli.index')->with([ 'success' => 'Berhasil diupdate' ]);
    }
    public function destroy($id)
    {
        $pembeli = Mpembeli::findOrFail($id);
        $pembeli->delete();

        return redirect()->route('pembeli.index')->with('Sukses', 'Berhasil dihapus');
    }

    private function kode_pembeli() 
    {
        $tahun = date('y');
        $bulan = date('m');
        $tahun_bulan = $tahun . $bulan;

        $nomor_terakhir = Mpembeli::where('id_pembeli', 'like', 'P-' . $tahun_bulan . '%')
            ->orderBy('id_pembeli', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'P-' . $tahun_bulan . '0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_pembeli, 7);
            $newKodeNumber = $lastKode + 1;
            $newKode = 'P-' . $tahun_bulan . str_pad($newKodeNumber, 4, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }

    public function cetak()
    {
        $pembeli = Mpembeli::all();
        return view('pembeli.cetak', compact('pembeli'));
    }

    public function excel()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Pembeli.xls");

        $pembeli = Mpembeli::get();
        return view('pembeli.excel', compact('pembeli'));
    }
}

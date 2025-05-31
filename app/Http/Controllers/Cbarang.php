<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mbarang;

class Cbarang extends Controller
{
    public function index()
    {
        $judul = 'Data Barang';
        $barang = Mbarang::get();
        return view('barang.index', compact('barang','judul'));
    }
    public function create()
    {
        $kode_barang = $this->kode_barang();
        return view('barang.create', compact('kode_barang'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_barang'     => 'required|max:10|unique:barang,id_barang',
            'nama_barang'   => 'required|regex:/^[\pL\s]+$/u',
            'harga_beli'    => 'required|numeric|min:0',
            'harga_jual'    => 'required|numeric|min:0',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = $request->file('foto');
        $filename = null;
        if($foto) {
            $extension = $foto->getClientOriginalExtension();
            $filename = date('YmdHis') . '.' . $extension;
            $foto->move(public_path('uploads/foto_barang'), $filename);
        }

        Mbarang::create([
            'id_barang'     => $request->id_barang,
            'nama'          => $request->nama_barang,
            'varian'        => $request->varian,
            'harga_beli'    => $request->harga_beli,
            'harga_jual'    => $request->harga_jual,
            'foto'          => $filename,
        ]);

        return redirect()->route('barang.index')->with('status',['judul' => 'Sukses', 'pesan' => 'Data Tersimpan', 'icon' => 'success']);
    }

    public function edit($id)
    {
        $barang = Mbarang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'   => 'required|regex:/^[\pL\s]+$/u',
            'harga_beli'    => 'required|numeric|min:0',
            'harga_jual'    => 'required|numeric|min:0',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $barang = Mbarang::findOrFail($id);

        $data = [
            'id_barang'     => $request->id_barang,
            'nama'          => $request->nama_barang,
            'varian'        => $request->varian,
            'harga_beli'    => $request->harga_beli,
            'harga_jual'    => $request->harga_jual,
        ];

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($barang->foto && file_exists(public_path('uploads/foto_barang/' . $barang->foto))) {
                unlink(public_path('uploads/foto_barang/' . $barang->foto));
            }
            $foto = $request->file('foto');
            $filename = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('uploads/foto_barang'), $filename);
            $data['foto'] = $filename;
        }

        $barang->update($data);

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function destroy($id)
    {
        $barang = Mbarang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('Sukses', 'Data Berhasil Dihapus');
    }
    
    private function kode_barang()
    {
        $tahun = date('y');
        $bulan = date('m');
        $tahun_bulan = $tahun . $bulan;

        $nomor_terakhir = Mbarang::where('id_barang', 'like', 'B-' . $tahun_bulan . '%')
            ->orderBy('id_barang', 'desc')
            ->first();

        if (!$nomor_terakhir) {
            $newKode = 'B-' . $tahun_bulan . '0001';
        } else {
            $lastKode = (int) substr($nomor_terakhir->id_barang, 7);
            $newKodeNumber = $lastKode + 1;
            $newKode = 'B-' . $tahun_bulan . str_pad($newKodeNumber, 4, '0', STR_PAD_LEFT);
        }
        return $newKode;
    }

    public function cetak()
    {
        $barang = Mbarang::get();
        return view('barang.cetak', compact('barang'));
    }

    public function excel()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Barang.xls");

        $barang = Mbarang::get();
        return view('barang.excel', compact('barang'));
    }
}

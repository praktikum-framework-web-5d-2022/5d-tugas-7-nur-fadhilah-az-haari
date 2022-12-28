<?php

namespace App\Http\Controllers;

use App\Models\Pelayan;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::get();
        return view('pembeli.index', compact('pembelis'));
    }

    public function create()
    {
        return view('pembeli.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'no_antrian' => 'required|numeric',
            'nama_pembeli' => 'required',
            'level_pedas' => 'required'
        ]);

        Pembeli::create($validate);
        return redirect()->route('pembeli.index')->with('message', "Data Pembeli {$validate['nama_pembeli']} berhasil ditambahkan");
    }

    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect()->route('pembeli.index')->with('message', "Data Pembeli {$pembeli->nama_pembeli} berhasil dihapus");
    }

    public function edit(Pembeli $pembeli)
    {
        return view('pembeli.edit', compact('pembeli'));
    }

    public function update(Request $request, Pembeli $pembeli)
    {
        $validate = $request->validate([
            'no_antrian' => 'required|numeric',
            'nama_pembeli' => 'required',
            'level_pedas' => 'required'
        ]);

        $pembeli->update($validate);

        return redirect()->route('pembeli.index')->with('message', "Data Pembeli {$pembeli->nama_pembeli} berhasil diubah");
    }

    public function show(Pembeli $pembeli)
    {
        return view('pembeli.show', compact('pembeli'));
    }

    public function take(Pembeli $pembeli)
    {
        $pelayans = Pelayan::get();
        return view('pembeli.take', compact('pembeli', 'pelayans'));
    }

    public function takeStore(Request $request, Pembeli $pembeli)
    {
        $pelayans = Pelayan::find($request->pelayan_id);
        $pembeli->pelayans()->sync($pelayans);

        return redirect()->route('pembeli.index')->with('message', 'Berhasil menambahkan pesanan');
    }
}

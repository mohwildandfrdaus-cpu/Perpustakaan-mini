<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['buku', 'anggota'])->latest()->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $bukus = Buku::where('stok', '>', 0)->get();
        $anggotas = Anggota::all();
        return view('peminjaman.create', compact('bukus', 'anggotas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'anggota_id' => 'required|exists:anggotas,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        $buku = Buku::findOrFail($request->buku_id);
        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis!');
        }

        $buku->decrement('stok');

        Peminjaman::create([
            'buku_id' => $request->buku_id,
            'anggota_id' => $request->anggota_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'dipinjam',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil!');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $bukus = Buku::all();
        $anggotas = Anggota::all();
        return view('peminjaman.edit', compact('peminjaman', 'bukus', 'anggotas'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'anggota_id' => 'required|exists:anggotas,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        if ($request->status == 'dikembalikan' && $peminjaman->status == 'dipinjam') {
            $peminjaman->buku->increment('stok');
        }

        if ($request->status == 'dipinjam' && $peminjaman->status == 'dikembalikan') {
            $peminjaman->buku->decrement('stok');
        }

        $peminjaman->update($validated);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman diperbarui!');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status == 'dipinjam') {
            $peminjaman->buku->increment('stok');
        }
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman dihapus!');
    }
}
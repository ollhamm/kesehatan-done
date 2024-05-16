<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\KunjunganLabolaturium;
use App\Models\Pemeriksaan;

class KunjunganLabolaturiumController extends Controller
{
    public function showKunjunganForm()
    {
        $kunjunganLabolaturium = KunjunganLabolaturium::with('pemeriksaan.patients')->get();
        return view('auth.kunjungan_labolaturium', compact('kunjunganLabolaturium'));
    }

    // Create
    public function create()
    {
        $kunjungan = Pemeriksaan::with('patients')->get();
        return view('auth.createKunjunganLab', compact('kunjungan'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pemeriksaan' => 'required',
            'tanggal_kunjungan' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);
        KunjunganLabolaturium::create($validatedData);
        return redirect()->route('kunjunganLabolaturium')->with('success', 'Pasien berhasil ditambahkan.');
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Pemeriksaan;
use Illuminate\Support\Str;

class PemeriksaanController extends Controller
{
    public function showPemeriksaanForm(Request $request)
    {
        $pemeriksaans = Pemeriksaan::with('patients')->get();

        return view('auth.pemeriksaan', compact('pemeriksaans'));
    }



    // genereate kode P00
    private function generateRMCode()
    {
        $latestRM = Patient::latest()->value('rm');
        if ($latestRM) {
            $code = Str::of($latestRM)->replace('P', '');
            $nextNumber = (int) $code->__toString() + 1;
            return 'P' . sprintf('%03d', $nextNumber);
        } else {
            return 'P001';
        }
    }

    private function generateINCode()
    {
        $latestRM = Patient::latest()->value('id_pasien');
        if ($latestRM) {
            $code = Str::of($latestRM)->replace('P', '');
            $nextNumber = (int) $code->__toString() + 1;
            return (string) $nextNumber;
        } else {
            return '1';
        }
    }
    public function create()
    {
        $defaultRM = $this->generateRMCode();
        $defaultIN = $this->generateINCode();
        $pemeriksaan = Patient::all();
        return view('auth.createPemeriksaan', compact('pemeriksaan', 'defaultRM', 'defaultIN'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'unit_pemeriksaan' => 'required',
            'rujukan_pemeriksaan' => 'required',
            'rincian_pemeriksaan' => 'required',
            'jenis_pembayaran' => 'required',
        ]);
        Pemeriksaan::create($validatedData);
        return redirect()->route('pemeriksaan')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // edit pemeriksaan
    public function edit($id_periksa)
    {
        $pemeriksaans = Pemeriksaan::findOrFail($id_periksa);
        return view('auth.editPemeriksaan', compact('pemeriksaans'));
    }
    public function update(Request $request, $id_periksa)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'unit_pemeriksaan' => 'required',
            'rujukan_pemeriksaan' => 'required',
            'rincian_pemeriksaan' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        $pemeriksaans = Pemeriksaan::findOrFail($id_periksa);
        $pemeriksaans->update($validatedData);

        return redirect()->route('pemeriksaan')->with('success', 'Data pasien berhasil diperbarui.');
    }

    // Delete periksa
    public function destroy($id_periksa)
    {
        // Hapus data pasien dari database
        $pemeriksaans = Pemeriksaan::findOrFail($id_periksa);
        $pemeriksaans->delete();

        return redirect()->route('pemeriksaan')->with('success', 'Data pasien berhasil dihapus.');
    }

    // Show Details Pemeriksaan
public function showPemeriksaanDetails($id_periksa)
{
    // Ambil data pemeriksaan berdasarkan ID
    $pemeriksaan = Pemeriksaan::with('patients')->findOrFail($id_periksa);

    // Jika pemeriksaan ditemukan
    if ($pemeriksaan) {
        // Ambil nama pasien dari relasi patients
        $nama_pasien = $pemeriksaan->patients->nama;

        // Kirim data pemeriksaan dan nama pasien ke view
        return view('auth.detailPemeriksaan', compact('pemeriksaan', 'nama_pasien'));
    } else {
        // Jika pemeriksaan tidak ditemukan, redirect atau tampilkan pesan error
        return redirect()->route('pemeriksaan')->with('error', 'Data pemeriksaan tidak ditemukan.');
    }
}
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instrumen;

class InstrumenController extends Controller
{
    public function showInstrumenForm(Request $request)
    {
        $query = Instrumen::query();

        if ($request->has('nama_reagen_kit')) {
            $query->where('nama_reagen_kit', 'like', '%' . $request->nama_reagen_kit . '%');
        }
        $instrumen = $query->get();
        return view('auth.minstrumen', compact('instrumen'));
    }

    // Create Instrumen
        public function create()
        {
            return view('auth.createInstrumen');
        }
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'instrumen' => 'required',
                'jumlah_instrumen'=>'required',
                'tanggal_t_maintenance' => 'required',
                'deskripsi' => 'required',
                'tanggal_b_maintenance' => 'required',
            ]);
    
            Instrumen::create($validatedData);
            return redirect()->route('instrumen')->with('success', 'Data berhasil ditambahkan.');
        }

        // Edit Instrumen
        public function edit($id_instrumen)
        {
            $instrumen = Instrumen::findOrFail($id_instrumen);
            return view('auth.editInstrumen', compact('instrumen'));
        }
    
        public function update(Request $request, $id_instrumen)
        {
            $validatedData = $request->validate([
                'instrumen' => 'required',
                'jumlah_instrumen'=>'required',
                'tanggal_t_maintenance' => 'required',
                'deskripsi' => 'required',
                'tanggal_b_maintenance' => 'required',
            ]);
    
            $instrumen = Instrumen::findOrFail($id_instrumen);
            $instrumen->update($validatedData);
    
            return redirect()->route('instrumen')->with('success', 'Data pasien berhasil diperbarui.');
        }

        // Delete Instrumen
            // Delete Reagensia
    public function destroy($id_instrumen)
    {
        // Hapus data pasien dari database
        $instrumen = Instrumen::findOrFail($id_instrumen);
        $instrumen->delete();

        return redirect()->route('instrumen')->with('success', 'Data pasien berhasil dihapus.');
    }

        // Details Instrumen
        public function showInstrumenDetail($id_instrumen)
        {
            $instrumen = Instrumen::findOrFail($id_instrumen);
        
            return view('auth.detailInstrumen', compact('instrumen'));
        }

    
}

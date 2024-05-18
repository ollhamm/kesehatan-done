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

        if ($request->has('instrumen')) {
            $query->where('instrumen', 'like', '%' . $request->instrumen . '%');
        }
        if ($request->has('jumlah_instrumen')) {
            $query->where('jumlah_instrumen', 'like', '%' . $request->jumlah_instrumen . '%');
        }
        if ($request->has('tanggal_t_maintenance')) {
            $query->where('tanggal_t_maintenance', 'like', '%' . $request->tanggal_t_maintenance . '%');
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

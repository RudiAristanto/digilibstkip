<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadMandiriController extends Controller
{
    public function create() {
        $kategori = Kategori::all();
        return view('upload_mandiri.create', compact('kategori')); 
    }

    public function store(Request $request) {
        $data = $request->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required|integer',
            'nama_penulis' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'program_studi' => 'nullable|string|max:255',
            'volume' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'link_journal' => 'nullable|string|max:255',
            'tanggal_unggah' => 'nullable|date',
            'file_upload' => 'required|mimes:pdf,doc,docx|max:1024',
        ]);
        
        // Simpan file
        $data['upload'] = $request->file('file_upload')->store('upload', 'public');
        
        // Hapus 'file_upload' karena tidak ada kolom itu di tabel
        unset($data['file_upload']);
        
        // Simpan data
        Alert::toast('Data berhasil ditambahkan!', 'success')->autoClose(3000);
        Document::create($data);
        
        // Redirect
        return redirect()->route('dokumen.saya')->with('success', 'Dokumen berhasil diunggah!');
    }

    public function myDocuments()
        {
            $documents = \App\Models\Document::where('nama_penulis', auth()->user()->name)->get();

            return view('upload_mandiri.index', compact('documents'));
        }
}

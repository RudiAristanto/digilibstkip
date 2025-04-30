<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Writer;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        if ($query) {
            $allDocument = Document::when($query, function($queryBuilder) use ($query){
                $queryBuilder->where('judul', 'like', '%'. $query .'%')
                ->orWhere('tahun', 'like', '%'. $query .'%');
            })->paginate(5);
            $allDocument->appends(['q' => $query]);
        }else {
            $allDocument = Document::latest()->paginate(5);
        }

        // $allDocument = Document::all();
        return view('document.index', compact('allDocument'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('document.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi
        $validateData = $request->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required|integer:4',
            'nama_penulis' => 'required|string|max:255',
            'writer_id' => 'required',
            'program_studi' => 'nullable|string|max:255',
            'volume' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'link_journal' => 'nullable|string|max:255',
            'tanggal_unggah' => 'nullable|date',
            'file_upload' =>'nullable|mimes:pdf,doc,docx|max:1024',
        ]);

        //upload file
        if ($request->hasFile('file_upload')) {
            $validateData['upload'] = $request->file('file_upload')->store('upload', 'public');
        }

        //hapus file
        unset($validateData['file_upload']);

        // simpan data
        Alert::toast('Data berhasil ditambahkan!', 'success')->autoClose(3000);
        Document::create($validateData);

        // redirect ke index document
        return redirect()->route('document.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('document.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $writer = Writer::all();
        $kategori = Kategori::all();
        return view('document.edit', compact('document', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        // buat validasi
        $validateData = $request->validate([
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required|digits:4',
            'kategori_id' => 'required',
            'nama_penulis' => 'required',
            'program_studi' => 'nullable|string|max:255',
            'volume' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'link_journal' => 'nullable|string|max:255',
            'tanggal_unggah' => 'nullable|date',
            'file_upload' =>'nullable|mimes:pdf,doc,docx|max:1024',
        ]);

         //upload file
         if ($request->hasFile('file_upload')) {
            $validateData['upload'] = $request->file('file_upload')->store('upload', 'public');

            if ($request->upload_lama) {
                Storage::delete('public/'.$request->upload_lama);
            }
        }else {
            // Pakai file lama jika tidak upload baru
            $validateData['upload'] = $request->upload_lama;
        }

        //hapus file
        unset($validateData['file_upload']);

        // update data
        $document->update($validateData);

        // redirect ke index document
        return redirect()->route('document.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
       
        if($document->upload && Storage::exists('public/'.$document->upload)){
            Storage::delete('public/'.$document->upload);
        }
        //proses hapus data
        $document->delete();
        // redirect ke index document
        Alert::toast('Data berhasil dihapus!', 'error')->autoClose(3000);
        return redirect()->route('document.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allWriter = Writer::all();
        return view('writer.index', compact('allWriter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('writer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi
        $validateData = $request->validate([
            'nama_writer' => 'required|max:100',
        ]);

        // simpan data
        Writer::create($validateData);

        // redirect ke index writer
        Alert::toast('Data berhasil ditambahkan!', 'success')->autoClose(3000);
        return redirect()->route('writer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Writer $writer)
    {
        return view('writer.show', compact('writer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Writer $writer)
    {
        return view('writer.edit', compact('writer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Writer $writer)
    {
        // buat validasi
        $validateData = $request->validate([
            'nama_writer' => 'required|max:100',
        ]);

        // update data
        $writer->update($validateData);

        // redirect ke index writer
        return redirect()->route('writer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();

        // redirect ke index writer
        Alert::toast('Data berhasil dihapus!', 'error')->autoClose(3000);
        return redirect()->route('writer.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allAnggota = Anggota::with('user')->get();
        return view('anggota.index', compact('allAnggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('anggota.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'alamat' => 'required|string',
            'nomor_tlp' => 'required|string',
        ]);
    
        // 1. Simpan ke tabel users
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'user', // pastikan kolom role tersedia di tabel users
        ]);
    
        // 2. Simpan ke tabel anggota, hubungkan dengan user_id
        Anggota::create([
            'user_id' => $user->id,
            'alamat' => $validated['alamat'],
            'nomor_tlp' => $validated['nomor_tlp'],
        ]);
        
        Alert::toast('Data berhasil ditambahkan!', 'success')->autoClose(3000);
        return redirect()->route('anggota.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        $anggota->load('user');
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        $valData = $request->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'nomor_tlp' => 'required',
        ]);

        $anggota->update($valData);
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        Alert::toast('Data berhasil dihapus!', 'error')->autoClose(3000);
        return redirect()->route('anggota.index');
    }
}

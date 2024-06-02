<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['mahasiswa'] = \App\Models\Mahasiswa::paginate(5);
        $data['judul'] = 'Data-Data Mahasiswa';
        return view('mahasiswa_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp'] = ['sistem informasi','teknik informasi','kewirausahawan','manajemen'];
        return view('mahasiswa_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama'=> 'required',
            'jurusan' => 'required',
            'nomor_hp' => 'required',
        ]);

        $mahasiswa =new \App\Models\mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->nomor_hp = $request->nomor_hp;
        $mahasiswa->save();

        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['mahasiswa'] = \App\Models\Mahasiswa::findOrFail($id);
        $data['list_sp'] = ['sistem informasi','teknik informasi','kewirausahawan','manajemen'];
        return view('mahasiswa_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,'.$id,
            'nama'=> 'required',
            'jurusan' => 'required',
            'nomor_hp' => 'required',
        ]);

        $mahasiswa = \App\Models\Mahasiswa::findOrFail($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->nomor_hp = $request->nomor_hp;
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('pesan', 'Data sudah DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = \App\Models\Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return back()->with('pesan','Data Sudah Dihapus');
    }

    public function laporan()
    {
        $data['mahasiswa'] = \App\Models\Mahasiswa::all();
        $data['judul'] = 'Laporan Data Mahasiswa';
        return view('mahasiswa_laporan',$data);
    }
}
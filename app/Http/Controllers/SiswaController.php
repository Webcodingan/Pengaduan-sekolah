<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::get();
        return view('Siswa.index', compact('siswas'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $siswas = DB::table('siswas')->where('nisn', 'like', "%" . $cari . "%")->orWhere('nama', 'like', "%" . $cari . "%")->paginate(4);

        return view('frontend.search', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ], [
            'nisn' => 'Nisn harus diisi dengan benar',
            'nama' => 'Nama harus diisi dengan benar',
            'alamat' => 'Alamat harus diisi dengan benar',
        ]);

        Siswa::create([
            'nisn' => $request->get('nisn'),
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
        ]);

        return redirect('siswa')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        $laporan = Pelaporan::where('siswa_id', $id)->get();
        return view('detail', ['laporan' => $laporan, 'nama' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('Siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        $siswa = Siswa::find($id);
        $siswa->nisn = $request->get('nisn');
        $siswa->nama = $request->get('nama');
        $siswa->alamat = $request->get('alamat');
        $siswa->save();

        return redirect('siswa')->with('message', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('siswa')->with('message', 'Data siswa berhasil dihapus');
    }
}

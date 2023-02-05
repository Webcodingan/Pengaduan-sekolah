<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaporan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\DB;
class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaporans = Pelaporan::get();
        return view('Pelaporan.index', compact('pelaporans'));
    }

    public function laporan()
    {
        $pelaporans = Pelaporan::latest()->get();
        return view('Pelaporan.laporan', compact('pelaporans'));
    }

    public function pdf()
    {
        $pelaporans = Pelaporan::latest()->get();
        $pdf = PDF::loadview('Pelaporan.pdf', compact('pelaporans'));
        return $pdf->download('laporan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pelaporan.create');
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
            'siswa_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
        ],[
            'lokasi' => 'Lokasi harus diisi dengan benar',
            'keterangan' => 'keterangan harus diisi dengan benar',
        ]);

        Pelaporan::create([
            'siswa_id' => $request->get('siswa_id'),
            'kategori_id' => $request->get('kategori_id'),
            'lokasi' => $request->get('lokasi'),
            'keterangan' => $request->get('keterangan'),
        ]);

        return redirect('/')->with('message', 'Data berhasil diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {
        return view('frontend.profile');
    }

    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        return view('Pelaporan.detail', compact('pelaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        return view('Pelaporan.edit', compact('pelaporan'));
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
            'siswa_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
        ]);
        $pelaporan = Pelaporan::find($id);
        $pelaporan->siswa_id = $request->get('siswa_id');
        $pelaporan->kategori_id = $request->get('kategori_id');
        $pelaporan->lokasi = $request->get('lokasi');
        $pelaporan->keterangan = $request->get('keterangan');
        $pelaporan->save();

        return redirect('pelaporan')->with('message', 'Data pelaporan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelaporan = Pelaporan::find($id);
        $pelaporan->delete();
        return redirect('pelaporan')->with('message', 'Data pelaporan berhasil dihapus');
    }
}

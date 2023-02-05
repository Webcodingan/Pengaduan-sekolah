<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\Pelaporan;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'pelaporan_id' => 'required',
            'status' => 'required',
            'feedback' => 'required',
        ]);

        Aspirasi::create([
            'pelaporan_id' => $request->get('pelaporan_id'),
            'status' => $request->get('status'),
            'feedback' => $request->get('feedback'),
            'siswa_id' => $request->get('siswa_id'),
        ]);

        return redirect('pelaporan')->with('message', 'Aspirasi berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaporan = Pelaporan::find($id);
        return view('Aspirasi.create', compact('pelaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspirasi = Aspirasi::find($id);
        return view('Aspirasi.edit', compact('aspirasi'));
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
            'pelaporan_id' => 'required',
            'status' => 'required',
            'feedback' => 'required',
        ]);

        // Pelaporan::where('id', $request->pelaporan_id)->update([
        //     'status' => $request->get('status'),
        // ]);

        $aspirasi = Aspirasi::find($id);
        $aspirasi->status = $request->get('status');
        $aspirasi->feedback = $request->get('feedback');
        $aspirasi->save();
        return redirect('pelaporan')->with('message', 'Aspirasi berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

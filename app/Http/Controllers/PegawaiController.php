<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawa = Pegawai::latest()->paginate(5);
        return view ('pegawa.index',compact('pegawa'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pegawa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_nama' => 'required',
            'pegawai_jabatan' => 'required',
            'pegawai_alamat' => 'required',
            'pegawai_umur' => 'required',
        ]);
        Pegawai::create($request->all());

        return redirect()->route('pegawa.index')->with('succes','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pegawa.show',compact('pegawa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawa)
    {
        return view('pegawa.edit', compact('pegawa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawa)
    {
        //
        $request->validate([
            'pegawai_nama' => 'required',
            'pegawai_jabatan' => 'required',
            'pegawai_alamat' => 'required',
            'pegawai_umur' => 'required',
        ]);

        $pegawa->update($request->all());

        return redirect()->route('pegawa.index')->with('succes','Pegawai Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawa)
    {
        $pegawa->delete();

        return redirect()->route('pegawa.index')->with('succes','Pegawai Berhasil di Hapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $petugas = petugas::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' =>$request->nama,
            'role'  =>'petugas',
            'email' =>$request->email,
            'password'   =>bcrypt($request->no_hp),
        ]);

        $petugas = petugas::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'kode' => $request->kode,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
        ]);

        if($petugas) {
            return redirect()->route('petugas.index')->with(['success'=>'data berhasil ditambahkan']);
        } else {
            return redirect()->route('petugas.index')->with(['gagal'=>'data gagal ditambahkan']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = petugas::find($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('email',$request->email)->update([
            'name' =>$request->nama,
            'role'  =>'petugas',
            'email' =>$request->email
        ]);

        $petugas = petugas::where('id',$id)->update([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
        ]);

        if($petugas){
            return redirect()->route('petugas.index')->with(['success'=>'data berhasil diupdate']);
        }
        else{
            return redirect()->route('petugas.index')->with(['error'=>'data error diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = petugas::find($id);
        $user = User::where('id', $petugas->user_id)->first();
        $user->delete();
        $cek = $petugas->delete();
        if($cek) {
            return redirect()->route('petugas.index')->with('success', 'data berhasil dihapus');
        } else {
            return redirect()->route('petugas.index')->with(['gagal'=>'data gagal dihapus']);
        }
    }
}

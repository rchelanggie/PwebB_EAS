<?php

namespace App\Http\Controllers;

use App\Models\LokasiModel;
use App\Models\PosisiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            if (Auth::user()->user_status == 'admin') {
                $posisi = PosisiModel::join('lokasi','lokasi.id_lokasi','=','posisi_jabatan.id_lokasi')->get();
                return view('admin.posisi', compact('posisi'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasi = LokasiModel::latest()->get();
        return view('admin.posisi_create', compact('lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PosisiModel();
        $data->nama_posisi = $request->nama_posisi;
        $data->id_lokasi = $request->id_lokasi;
        $data->save();
        return redirect()->route('data_posisi.index')
            ->with('success', 'Data posisi has been updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PosisiModel  $posisiModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posisi = PosisiModel::join('lokasi','lokasi.id_lokasi','=','posisi_jabatan.id_lokasi')->get();
        $data = PosisiModel::find($id);
        return view('admin.data_posisi', compact('data', 'posisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PosisiModel  $posisiModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PosisiModel $posisiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PosisiModel  $posisiModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PosisiModel::find($id);
        $data->nama_posisi = $request->nama_posisi;
        $data->id_lokasi = $request->id_lokasi;
        $data->save();
        return redirect()->route('data_posisi.index')
            ->with('success', 'Data posisi has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PosisiModel  $posisiModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PosisiModel::find($id);
        $data->delete();

        return redirect()->route('data_posisi.index')
            ->with('success', 'Data posisi has been deleted successfully.');
    }
}

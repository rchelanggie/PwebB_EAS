<?php

namespace App\Http\Controllers;

use App\Models\LokasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokasiController extends Controller
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
                $lokasi = LokasiModel::latest()->get();
                return view('admin.lokasi', compact('lokasi'));
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
        return view('admin.lokasi_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new LokasiModel();
        $data->nama_lokasi = $request->nama_lokasi;
        $data->save();
        return redirect()->route('data_lokasi.index')
            ->with('success', 'Data lokasi has been updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LokasiModel::find($id);
        return view('admin.data_lokasi', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function edit(LokasiModel $lokasiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = LokasiModel::find($id);
        $data->nama_lokasi = $request->nama_lokasi;
        $data->save();
        return redirect()->route('data_lokasi.index')
            ->with('success', 'Data lokasi has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LokasiModel  $lokasiModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LokasiModel::find($id);
        $data->delete();

        return redirect()->route('data_lokasi.index')
            ->with('success', 'Data lokasi has been deleted successfully.');
    }
}

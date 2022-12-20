<?php

namespace App\Http\Controllers;

use App\Models\BerkasModel;
use App\Models\KartuUjianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class KartuUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            if (Auth::user()->user_status == 'peserta') {
                $berkas = DB::table('berkas')->where('id_user', Auth::user()->id)->first();
                if ($berkas->status_dokumen != 'Verified') {
                    return view('users.index')->with('successMsg', 'Kartu ujian belum tersedia');
                } else {
                    $data = DB::table('kartu_ujian')->join('data_diri', 'data_diri.id_user', '=', 'kartu_ujian.id_user')
                        ->join('posisi_jabatan', 'data_diri.posisi_jabatan', '=', 'posisi_jabatan.id_posisi')
                        ->join('lokasi', 'posisi_jabatan.id_lokasi', '=', 'lokasi.id_lokasi')->where('kartu_ujian.id_user',Auth::user()->id)->first();
                    return view('users.kartu_ujian', compact('data'));
                }
            }
        }else{
            return redirect()->route('login')->with('danger', 'Login First');
        }
    }

    public function createPDF()
    {
        $kartu_ujian = DB::table('kartu_ujian')->join('data_diri', 'data_diri.id_user', '=', 'kartu_ujian.id_user')
        ->join('posisi_jabatan', 'data_diri.posisi_jabatan', '=', 'posisi_jabatan.id_posisi')
        ->join('lokasi', 'posisi_jabatan.id_lokasi', '=', 'lokasi.id_lokasi')->where('kartu_ujian.id_user',Auth::user()->id)->first();        
        $pdf = PDF::loadview('users.kartu_ujian_pdf',['data'=>$kartu_ujian]);
    	return $pdf->stream();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KartuUjianModel  $kartuUjianModel
     * @return \Illuminate\Http\Response
     */
    public function show(KartuUjianModel $kartuUjianModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KartuUjianModel  $kartuUjianModel
     * @return \Illuminate\Http\Response
     */
    public function edit(KartuUjianModel $kartuUjianModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KartuUjianModel  $kartuUjianModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KartuUjianModel $kartuUjianModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KartuUjianModel  $kartuUjianModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(KartuUjianModel $kartuUjianModel)
    {
        //
    }
}

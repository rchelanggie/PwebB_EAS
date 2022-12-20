<?php

namespace App\Http\Controllers;

use App\Models\BerkasModel;
use App\Models\KartuUjianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posisi = DB::table('posisi_jabatan')->join('lokasi', 'lokasi.id_lokasi', '=', 'posisi_jabatan.id_lokasi')->get();
        if (Auth::user()) {
            $id = Auth::user()->id;
            if (Auth::user()->user_status == 'admin') {
                $data = DB::table('berkas')->get();
            } else {
                $data = DB::table('berkas')->where('id_user', $id)->first();
                return view('users.data_berkas', compact('data', 'posisi'));
            }
        } else {
            return redirect()->route('login')->with('danger', 'Login First');
        }
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
        $berkas = new BerkasModel();
        $berkas->id_user = Auth::user()->id;
        if ($request->file('ijazah')) {
            $file = $request->file('ijazah');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $berkas->ijazah = $filename;
        }
        if ($request->file('ktp')) {
            $file = $request->file('ktp');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $berkas->ktp = $filename;
        }
        if ($request->file('kk')) {
            $file = $request->file('kk');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $berkas->kk = $filename;
        }
        if ($request->file('formulir')) {
            $file = $request->file('formulir');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $berkas->formulir = $filename;
        }
        $berkas->save();
        return redirect()->route('data_berkas.index')
            ->with('success', 'Data berkas has been updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BerkasModel  $berkasModel
     * @return \Illuminate\Http\Response
     */

    public function download($nama)
    {
        return response()->download(storage_path('../public/foto/' . $nama));
    }

    public function show(BerkasModel $berkasModel)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BerkasModel  $berkasModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BerkasModel $berkasModel)
    {
        $posisi = DB::table('posisi_jabatan')->join('lokasi', 'lokasi.id_lokasi', '=', 'posisi_jabatan.id_lokasi')->get();
        if (Auth::user()) {
            $id = Auth::user()->id;
            $data = BerkasModel::where('id_user',$id)->first();
            return view('users.data_berkas_update', compact('data', 'posisi'));
        } else {
            return redirect()->route('login')->with('danger', 'Login First');
        }
    }

    public function update(Request $request, $id_peserta)
    {
        if (Auth::user()->user_status == 'admin') {
            $data = BerkasModel::where('id_user', $id_peserta)->first();
            $data->status_dokumen = $request->status_dokumen;
            if($request->status_dokumen == 'Verified'){
                $kartu = new KartuUjianModel();
                $kartu->id_kartu = Str::random(15);
                $kartu->id_user = $id_peserta;
                $kartu->tanggal_ujian = NOW();
                $kartu->save();
            }
            $data->save();
            return redirect()->route('admin')
                ->with('success', 'Data diri has been updated successfully.');
        } else {
            $id = Auth::user()->id;
            $berkas = BerkasModel::where('id_user', $id)->first();
            if ($request->file('ijazah')) {
                $file = $request->file('ijazah');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('foto'), $filename);
                $berkas->ijazah = $filename;
            }
            if ($request->file('ktp')) {
                $file = $request->file('ktp');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('foto'), $filename);
                $berkas->ktp = $filename;
            }
            if ($request->file('kk')) {
                $file = $request->file('kk');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('foto'), $filename);
                $berkas->kk = $filename;
            }
            if ($request->file('formulir')) {
                $file = $request->file('formulir');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('foto'), $filename);
                $berkas->formulir = $filename;
            }
            $berkas->save();
            return redirect()->route('data_berkas.index')
                ->with('success', 'Data berkas has been updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BerkasModel  $berkasModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BerkasModel::find($id);
        $data->delete();

        return redirect()->route('data_berkas.index')
            ->with('success', 'Data berkas has been deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BerkasModel;
use App\Models\DataModel;
use App\Models\PosisiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{

    public function index()
    {
        $posisi = DB::table('posisi_jabatan')->join('lokasi', 'lokasi.id_lokasi', '=', 'posisi_jabatan.id_lokasi')->get();
        if (Auth::user()) {
            $id = Auth::user()->id;
            if (Auth::user()->user_status == 'admin') {
                $data = DataModel::latest()->get();
                return view('admin.data_diri', compact('data', 'posisi'));
            } else {
                $data = DataModel::find($id);
                return view('users.data_diri', compact('data', 'posisi'));
            }
        } else {
            return redirect()->route('login')->with('danger', 'Login First');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = new DataModel();
        $data->id_user = Auth::user()->id;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->pendidikan = $request->pendidikan;
        $data->posisi_jabatan = $request->posisi_jabatan;
        $data->alamat = $request->alamat;
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        return redirect()->route('data_diri.index')
            ->with('success', 'Data diri has been updated successfully.');
    }

    public function show($id)
    {
        $posisi = DB::table('posisi_jabatan')->join('lokasi', 'lokasi.id_lokasi', '=', 'posisi_jabatan.id_lokasi')->get();
        if (Auth::user()) {
            if (Auth::user()->user_status == 'admin') {
                $data = DataModel::find($id);
                $data_berkas = DB::table('berkas')->where('id_user', $id)->first();
                return view('admin.data_peserta', compact('data', 'posisi', 'data_berkas'));
            }
        } else {
            return redirect()->route('login')->with('danger', 'Login First');
        }
    }

    public function edit(DataModel $dataModel)
    {
        $posisi = DB::table('posisi_jabatan')->join('lokasi', 'lokasi.id_lokasi', '=', 'posisi_jabatan.id_lokasi')->get();
        if (Auth::user()) {
            $id = Auth::user()->id;
            $data = DataModel::find($id);
            return view('users.data_diri_update', compact('data', 'posisi'));
        } else {
            return redirect()->route('login')->with('danger', 'Login First');
        }
    }

    public function update(Request $request, $id_peserta)
    {
        if (Auth::user()->user_status == 'admin') {
            $data = DataModel::find($id_peserta);
            $data->status_pendaftaran = $request->status_pendaftaran;
            $data->save();
            return redirect()->route('admin')
                ->with('success', 'Data diri has been updated successfully.');
        } else {
            $id = Auth::user()->id;
            $data = DataModel::find($id);
            $data->nama = $request->nama;
            $data->nik = $request->nik;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->pendidikan = $request->pendidikan;
            $data->posisi_jabatan = $request->posisi_jabatan;
            $data->alamat = $request->alamat;
            if ($request->file('foto')) {
                $file = $request->file('foto');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('foto'), $filename);
                $data->foto = $filename;
            }
            $data->save();
            return redirect()->route('data_diri.index')
                ->with('success', 'Data diri has been updated successfully.');
        }
    }

    public function destroy($id)
    {
        $data = DataModel::find($id);
        $data->delete();

        return redirect()->route('data_diri.index')
            ->with('success', 'Data diri has been deleted successfully.');
    }
}

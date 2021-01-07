<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Mime\MimeTypes;
use App\Models\User;
use App\Models\Biodata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DataTables;


class AdminController extends Controller
{
    public function dashboard()
    {
        $count = User::count();
        return view('admin/dashboard')->with('count', $count);
    }

    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $users = \App\Models\User::all();
        if ($keyword) {
            $users = \App\Models\User::where("username", "LIKE", "%$keyword%")->paginate(10);
        } else {
            $users = \App\Models\User::all();
        }
        return view('admin/datausers', ['users' => $users]);
    }

    public function create(Request $request)
    {
        $users = new User;
        $users->nip = $request->input('nip');
        $users->username = $request->input('username');
        $users->level = $request->input('level');
        $users->email = $request->input('email');
        $users->satker = $request->input('satker');
        $users->remember_token = Str::random(60);
        $users->password = Hash::make($request->input('password'));
        if ($request->hasfile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $users->image = $request->file('image')->getClientOriginalName();
            $users->save();
        }
        return redirect('/users')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function biodatacreate(Request $request)
    {

        $biodata = new Biodata;
        $biodata->nama_lengkap = $request->input('nama_lengkap');
        $biodata->jenis_kelamin = $request->input('jenis_kelamin');
        $biodata->agama = $request->input('agama');
        $biodata->alamat = $request->input('alamat');
        $biodata->kode_pos = $request->input('kode_pos');
        $biodata->tempat_lahir = $request->input('tempat_lahir');
        $biodata->tanggal_lahir = $request->input('tanggal_lahir');
        $biodata->status_nikah = $request->input('status_nikah');
        $biodata->nomor_telepon = $request->input('nomor_telepon');
        $biodata->warga_negara = $request->input('warga_negara');
        $biodata->no_npwp = $request->input('no_npwp');
        $biodata->pendidikan_terakhir = $request->input('pendidikan_terakhir');
        if ($request->hasfile('image')) {
            $request->file('image')->move('filektp/', $request->file('image')->getClientOriginalName());
            $biodata->image = $request->file('image')->getClientOriginalName();
            $biodata->save();
        }


        return redirect('admin/datausers')->with('update', 'Data berhasil diupdate!');
    }

    public function detail($id)
    {
        //$biodata = \App\Models\User::all();
        $biodata = \App\Models\Biodata::where('user_id', $id)->get();
        //dd($biodata);
        return view('admin/detail', ['biodata' => $biodata]);
    }

    public function diterima(Request $request, $id)
    {
        $biodata = \App\Models\Biodata::find($id);
        $biodata->status = 'Diterima';
        $biodata->update($request->all());

        return redirect('/admin/datausers')->with('diterima', 'Pelamar Berhasil Diterima!');
    }

    public function ditolak(Request $request, $id)
    {
        $biodata = \App\Models\Biodata::find($id);
        $biodata->status = 'Ditolak';
        $biodata->update($request->all());

        return redirect('/admin/datausers')->with('ditolak', 'Pelamar Berhasil Ditolak!');
    }
}

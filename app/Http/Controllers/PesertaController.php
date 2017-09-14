<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_peserta;
use App\TbMProgram;
use App\TbMKejuruan;
use App\TbMSubKejuruan;
use Session;
use App\TbMProvinsi;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $program = TbMProgram::all();
        $peserta = tb_m_peserta::all();
        $kejuruan = TbMKejuruan::all();
        $subkejuruan = TbMSubKejuruan::all();
        $provinsi = TbMProvinsi::all();
        return view('peserta.index',compact('peserta','program','kejuruan','subkejuruan','provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $program = TbMProgram::all();
        $peserta = tb_m_peserta::all();
        return view('program.create', compact('program','peserta'));
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
        $peserta = new tb_m_peserta();
        $peserta->tgl_daftar= $request->tgl_daftar;
        $peserta->kd_program= $request->kd_program;
        $peserta->kd_kejuruan= $request->kd_kejuruan;
        $peserta->kd_sub_kejuruan= $request->kd_sub_kejuruan;
        $peserta->nama= $request->nama;
        $peserta->tempat_lahir= $request->tempat_lahir;
        $peserta->tgl_lahir= $request->tgl_lahir;
        $peserta->jenis_kelamin= $request->jenis_kelamin;
        $peserta->tinggi_badan= $request->tinggi_badan;
        $peserta->berat_badan= $request->berat_badan;
        $peserta->alamat= $request->alamat;
        $peserta->rt= $request->rt;
        $peserta->rw= $request->rw;
        $peserta->provinsi= $request->provinsi;
        $peserta->kab= $request->kab;
        $peserta->kecamatan= $request->kecamatan;
        $peserta->kelurahan= $request->kelurahan;
        $peserta->telp= $request->telp;
        $peserta->agama= $request->agama;
        $peserta->pendidikan_terakhir= $request->pendidikan_terakhir;
        $peserta->pelatihan= $request->pelatihan;
        $peserta->kewarganegaraan= $request->kewarganegaraan;
        $peserta->anak_ke= $request->anak_ke;
        $peserta->status= $request->status;
        $peserta->nama_pasangan= $request->nama_pasangan;
        $peserta->nama_anak= $request->nama_anak;
        $peserta->pengalaman_kerja= $request->pengalaman_kerja;
        $peserta->nama_ortuwali= $request->nama_ortuwali;
        $peserta->alamat_ortuwali= $request->alamat_ortuwali;
        $peserta->telp_ortuwali= $request->telp_ortuwali;
        $peserta->foto= $request->foto;
        $peserta->save();
        Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"Berhasil Menyimpan Data Peserta"
        ]);
        return redirect()->route('peserta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TbMKejuruan;
use App\TbMProgram;
use App\TbMSubKejuruan;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()){
            $program = TbMProgram::all();
            return Datatables::of($program)
           ->addColumn('check', function($data){
               return '<input type="checkbox" name="check[]" value="'.$data->kd_sub_kejuruan.'" onclick="addId(this)">';

        })
            ->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'check', 'name'=>'', 'title'=>'Select' ])
        ->addColumn(['data' => 'kd_program', 'name'=>'kd_program', 'title'=>'Kode Program' ])
        ->addColumn(['data' => 'nama_program', 'name'=>'nama_program', 'title'=>'Nama Program'])
        ->addColumn(['data' => 'kd_kejuruan', 'name'=>'kd_kejuruan', 'title'=>'Nama Kejuruan'])
        ->addColumn(['data' => 'kd_sub_kejuruan', 'name'=>'kd_sub_kejuruan','title'=>'Nama Sub Kejuruan'])
        ->addColumn(['data' => 'jumlah_paket', 'name'=>'jumlah_paket','title'=>'Jumlah Paket'])
        ->addColumn(['data' => 'lama_pelatihan', 'name'=>'lama_pelatihan','title'=>'Lama pelatihan'])
        ->addColumn(['data' => 'asrama', 'name'=>'asrama','title'=>'Asrama']);
        $kejuruan = TbMKejuruan::all();
        $subkejuruan = TbMSubKejuruan::all();
        return view('program.index')->with(compact('html','kejuruan','subkejuruan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //  $program= TbMProgram::all();
        // $kejuruan= TbMKejuruan::all();
        // $subkejuruan= TbMSubKejuruan::all();
        // return view('program.create', compact('program','kejuruan','subkejuruan'));
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
        
        $this->validate($request,[
            'kd_program'=>"required|unique:tb_m_programs,kd_program"]);
        $program = new TbMProgram();
        $program->kd_program = $request->kd_program;
        $program->nama_program = $request->nama_program;
        $program->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $program->kd_kejuruan = $request->kd_kejuruan;
        $program->jumlah_paket = $request->jumlah_paket;
        $program->lama_pelatihan = $request->lama_pelatihan;
        $program->asrama = $request->asrama;
        $program->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Data Sub Kejuruan"
            ]);
        return redirect()->route('program.index');
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
        $kejuruan = TbMKejuruan::all();
        $subkejuruan = TbMSubKejuruan::all();
        $program = TbMProgram::where('kd_sub_kejuruan',$id)->get();
        return view('program.edit',compact('program','kejuruan','subkejuruan'))->with(array('program' => $program[0]));
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
        $program = TbMProgram::findOrFail($id);
       $program->kd_program = $request->kd_program;
        $program->nama_program = $request->nama_program;
        $program->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $program->kd_kejuruan = $request->kd_kejuruan;
        $program->jumlah_paket = $request->jumlah_paket;
        $program->lama_pelatihan = $request->lama_pelatihan;
        $program->asrama =$request->asrama;
        $program->save();
        Session::flash("flash_notification",[
            "level"=>"warning",
            "message"=>"Berhasil Merubah Data Program"
            ]);
        return redirect()->route('program.index');
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
         $ids = $request->ids;
        TbMProgram::destroy($ids);
        Session::flash("flash_notification",[
            "level"=>"danger",
            "message"=>"Berhasil Menghapus Data Program"
            ]);
        return redirect()->route('program.index');
    }

}

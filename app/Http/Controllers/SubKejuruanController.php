<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TbMSubKejuruan;
use App\TbMKejuruan;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;
class SubKejuruanController extends Controller
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
            $subkejuruan = TbMSubKejuruan::all();
            return Datatables::of($subkejuruan)
             ->addColumn('check', function($data){
               return '<input type="checkbox" name="check[]" value="'.$data->kd_sub_kejuruan.'" onclick="addId(this)">';

        })
            ->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'check', 'name'=>'', 'title'=>'Select' ])
        ->addColumn(['data' => 'kd_sub_kejuruan', 'name'=>'kd_sub_kejuruan', 'title'=>'Kode Sub Kejuruan' ])
        ->addColumn(['data' => 'nama_sub_kejuruan', 'name'=>'nama_sub_kejuruan', 'title'=>'Nama Sub Kejuruan'])
        ->addColumn(['data' => 'kd_kejuruan','name'=>'kd_kejuruan','title'=>'Nama Kejuruan'])
        ->addColumn(['data' => 'keterangan', 'name'=>'keterangan', 'title'=>'Keterangan']);
        $kejuruan = TbMKejuruan::all();
        return view('subkejuruan.index')->with(compact('html','kejuruan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //  $subkejuruan= TbMSubKejuruan::all();
        // $kejuruan = TbMKejuruan::all();
        // return view('subkejuruan.create', compact('subkejuruan','kejuruan'));
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
            'kd_sub_kejuruan'=>"required|unique:tb_m_sub_kejuruans,kd_sub_kejuruan"]);
        $subkejuruan = new TbMSubKejuruan();
        $subkejuruan->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $subkejuruan->kd_kejuruan = $request->kd_kejuruan;
        $subkejuruan->nama_sub_kejuruan = $request->nama_sub_kejuruan;
        $subkejuruan->keterangan = $request->keterangan;
        $subkejuruan->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Data Sub Kejuruan"
            ]);
        return redirect()->route('subkejuruan.index');
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
        $subkejuruan = TbMSubKejuruan::where('kd_sub_kejuruan',$id)->get();
        return view('subkejuruan.edit',compact('kejuruan','subkejuruan'))->with(array('subkejuruan' => $subkejuruan[0]));
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
         $subkejuruan = TbMSubKejuruan::findOrFail($id);
         $subkejuruan->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $subkejuruan->kd_kejuruan = $request->kd_kejuruan;
        $subkejuruan->nama_sub_kejuruan = $request->nama_sub_kejuruan;
        $subkejuruan->keterangan = $request->keterangan;
        $subkejuruan->save();
        Session::flash("flash_notification",[
            "level"=>"warning",
            "message"=>"Berhasil Merubah Data Sub Kejuruan"
            ]);
        return redirect()->route('subkejuruan.index');
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
        TbMSubKejuruan::destroy($ids);
        Session::flash("flash_notification",[
            "level"=>"danger",
            "message"=>"Berhasil Menghapus Data Sub Kejuruan"
            ]);
        return redirect()->route('subkejuruan.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TbMKejuruan;
use Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
class KejuruanController extends Controller
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
            $kejuruan = TbMKejuruan::all();
            return Datatables::of($kejuruan)
            ->addColumn('check', function($data){
               return '<input type="checkbox" name="check[]" value="'.$data->kd_kejuruan.'" onclick="addId(this)">';

        })
            ->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'check', 'name'=>'', 'title'=>'Select' ])
        ->addColumn(['data' => 'kd_kejuruan', 'name'=>'kd_program', 'title'=>'Kode Kejuruan' ])
        ->addColumn(['data' => 'nama_kejuruan', 'name'=>'nama_program', 'title'=>'Nama Kejuruan'])
        ->addColumn(['data' => 'keterangan', 'name'=>'keterangan', 'title'=>'Keterangan']);


        return view('kejuruan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $kejuruan= TbMKejuruan::all();
        // return view('kejuruan.create', compact('kejuruan'));
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
            'kd_kejuruan'=>"required|unique:tb_m_kejuruans,kd_kejuruan"]);
        $kejuruan = new TbMKejuruan();
        $kejuruan->kd_kejuruan = $request->kd_kejuruan;
        $kejuruan->nama_kejuruan = $request->nama_kejuruan;
        $kejuruan->keterangan = $request->keterangan;
        $kejuruan->save();
        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Data Kejuruan"
            ]);
        return redirect()->route('kejuruan.index');
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
        //dd($kd_kejuruan); 
         $kejuruan = TbMKejuruan::where('kd_kejuruan',$id)->get();
      
        return view('kejuruan.edit')->with(array('kejuruan' => $kejuruan[0]));

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
        $kejuruan = TbMKejuruan::findOrFail($id);
        $kejuruan->kd_kejuruan = $request->kd_kejuruan;
        $kejuruan->nama_kejuruan = $request->nama_kejuruan;
        $kejuruan->keterangan = $request->keterangan;
        $kejuruan->save();
        Session::flash("flash_notification",[
            "level"=>"warning",
            "message"=>"Berhasil Merubah Data Kejuruan"
            ]);
        return redirect()->route('kejuruan.index');
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
                
        $kejuruan = TbMKejuruan::where('kd_kejuruan',$id)->get();
        $kejuruan->delete();
        Session::flash("flash_notification",[
            "level"=>"danger",
            "message"=>"Berhasil Menghapus Data Kejuruan"
            ]);
        
        return redirect()->route('kejuruan.index');
    }

}

@extends('layouts.master')
@section('contents')

	  <div class="col-md-12">
			<div class="panel panel-primary">
        <header class="panel-heading"><b>Tambah Program</b></header>
				<div class="panel-body">
					  <form action="{{route('program.store')}}" method="post" >
				 	    {{ csrf_field() }}
						    <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Program</label>
                  <div class="col-sm-4">
                    <input name="kd_program" type="text" class="form-control" required  />
                    {!! $errors->first('kd_program', '<p class="help-block">Data Sudah Ada</p>') !!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Program</label>
                  <div class="col-sm-4">
                    <input name="nama_program" type="text" class="form-control" required  />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Sub Kejuruan</label>
                  <div class="col-sm-4">
                    <select name="kd_sub_kejuruan" class="form-control">
                      @foreach($subkejuruan as $data)
                      <option value="{{$data->kd_sub_kejuruan}}">{{$data->nama_sub_kejuruan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kejuruan</label>
                  <div class="col-sm-4">
                    <select name="kd_kejuruan" class="form-control">
                      @foreach($kejuruan as $data)
                      <option value="{{$data->kd_kejuruan}}">{{$data->nama_kejuruan}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Paket</label>
                  <div class="col-sm-4">
                    <input name="jumlah_paket" type="number" class="form-control"   />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lama Pelatihan</label>
                  <div class="col-sm-4">
                    <input name="lama_pelatihan" type="number" class="form-control"  />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Asrama</label>
                  <div class="col-sm-4">
                    <input name="asrama" type="text" class="form-control"  />
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="form-group">
                    <div class="col-md-4">
                      <button type="Submit" value="Simpan" class="btn btn-primary">Simpan</button>
                      <td><a class="btn btn-danger" href="{{URL::previous()}}">Batal</a></td>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>

@endsection
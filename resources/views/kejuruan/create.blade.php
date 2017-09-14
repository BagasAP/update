@extends('layouts.master')
@section('contents')
		<div class="col-md-12">
			<div class="panel panel-primary">
        <header class="panel-heading"><h1><b>Tambah Kejuruan</b></h1></header>
					  <form action="{{route('kejuruan.store')}}" method="post" >
					    {{ csrf_field() }}
						  <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Kode Kejuruan</label>
                
                    <input name="kd_kejuruan" type="text" class="form-control" required  />
                      {!! $errors->first('kd_kejuruan', '<p class="help-block">Data Sudah Ada</p>') !!}
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama Kejuruan</label>
                  
                    <input name="nama_kejuruan" type="text" class="form-control" required  />
                 
              </div>
              <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                  
                    <input name="keterangan" type="text" class="form-control" required  />
                  
              </div>
              <div class="form-group" style="margin-bottom: 20px;">
                <label class="col-sm-2 col-sm-2 control-label"></label>
                  <div class="form-group">
                    
                      <button type="Submit" value="Simpan" class="btn btn-primary">Simpan</button>
                      <td><a class="btn btn-danger" href="{{URL::previous()}}">Batal</a></td>
                   
                  </div>
              </div>
            </form>
          </div>
        </div>


@endsection